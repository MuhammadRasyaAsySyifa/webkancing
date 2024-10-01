<?php

namespace App\Http\Controllers;
use App\Models\Jasa;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Jadwal;
    

class OrderController extends Controller
{
    public function isiwaktu($id)
    {
        Carbon::setLocale('id'); // Set locale untuk format tanggal dalam bahasa Indonesia
        $jasa = Jasa::findOrFail($id);
        
        // Mendapatkan jadwal yang tersedia untuk jasa tersebut
        $jadwals = Jadwal::where('id_jasa', $id)->get();
    
        // Ambil durasi dari jadwal yang pertama, jika ada
        $durasi = $jadwals->first() ? $jadwals->first()->durasi : 'Durasi tidak tersedia';
        
        // Mengambil tanggal yang tersedia dan mengubahnya menjadi format YYYY-MM-DD dalam WITA
        $availableDates = $jadwals->pluck('tanggal')->unique()->map(function($date) {
            return Carbon::parse($date, 'UTC')->setTimezone('Asia/Makassar')->toDateString(); // Konversi dari UTC ke WITA
        })->toArray();
        
        // Mengelompokkan waktu berdasarkan tanggal dalam WITA
        $timesByDate = [];
        foreach ($jadwals as $jadwal) {
            // Ubah tanggal dan jam dari UTC ke WITA
            $date = Carbon::parse($jadwal->tanggal, 'UTC')->setTimezone('Asia/Makassar')->toDateString();
            $timesByDate[$date][] = Carbon::parse($jadwal->jam, 'UTC')->setTimezone('Asia/Makassar')->format('H:i');
        }
        
        // Tanggal yang tidak tersedia (misalnya hari kemarin) dalam WITA
        $unavailableDates = [Carbon::now('Asia/Makassar')->subDay()->toDateString()]; // Menggunakan zona waktu WITA untuk tanggal unavailable
    
        return view('servis.isiWaktu', [
            'jasa' => $jasa,
            'availableDates' => $availableDates,
            'unavailableDates' => $unavailableDates,
            'timesByDate' => $timesByDate,
            'durasi' => $jasa->durasi,// Kirim durasi ke view
        ]);
    }
    
    public function isidata($id)
{
    $jasa = Jasa::findOrFail($id);
    $jadwals = Jadwal::where('id_jasa', $id)->get();
    
    // Ambil durasi dari jadwal yang pertama, jika ada
    $durasi = $jadwals->first() ? $jadwals->first()->durasi : 'Durasi tidak tersedia';

    // Kirimkan variabel ke view
    return view('servis.isidata', compact('jasa', 'durasi'));
}


    public function deskripsilayanan($id)
    {
        $jasa = Jasa::findOrFail($id); // Ambil data berdasarkan ID
        return view('servis.deskripsilayanan', compact('jasa'));
    }
    
    public function checkout2(Request $request)
{
    // Tambahkan status "Unpaid" dan jasa_id ke request sebelum menyimpannya ke database
    $request->request->add([
        'status' => 'Unpaid',
        'jasa_id' => session('booking_data')['jasa_id'] ?? null, // Ambil dari session atau atur nilainya
        'durasi' => session('booking_data')['durasi'],
    ]);

    // Simpan pesanan ke database
    $order = Order::create($request->all());

    // Redirect ke halaman invoice
    return redirect()->route('invoice', ['id' => $order->id]);
}

    
    
  public function checkout1(Request $request)
{
    // Validasi input tanggal dan waktu
    $validatedData = $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'jasa_id' => 'required|integer',
        'durasi'=> 'required',
    ]);

    // Ambil data
    $date = $validatedData['date'];
    $time = $validatedData['time'];
    $jasaId = $validatedData['jasa_id'];
    $durasi = $validatedData['durasi'];


    // Periksa apakah tanggal dan slot waktu yang dipilih sudah dibooking
    $isAlreadyBooked = Order::where('jasa_id', $jasaId)
                            ->where('date', $date)
                            ->where('time', $time)
                            ->exists();

  if ($isAlreadyBooked) {
        // Simpan pesan notifikasi dalam session
        session()->flash('error', 'Aduhh maaf ya waktu pada jam ' . $time . ' sudah dibooking. Silakan pilih waktu lain.');
        // Arahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Simpan data pemesanan dalam session
    session(['booking_data' => $validatedData]);

    // Arahkan ke halaman isidata dengan ID jasa
    return redirect()->route('isidata', ['id' => $jasaId]);
}
public function checkAvailability(Request $request)
{
    // Validasi input dari request
    $validatedData = $request->validate([
        'date' => 'required|date',           // Pastikan tanggal valid
        'time' => 'required|string',         // Pastikan waktu berupa string (misalnya: '08:00')
        'jasa_id' => 'required|integer',     // Pastikan jasa_id adalah integer
    ]);

    // Ambil nilai yang telah divalidasi
    $date = $validatedData['date'];
    $time = $validatedData['time'];
    $jasaId = $validatedData['jasa_id'];

    // Cek apakah waktu tersebut sudah dipesan
    $isAlreadyBooked = Order::where('jasa_id', $jasaId)
                            ->where('date', $date)
                            ->where('time', $time)
                            ->exists();  // Menggunakan exists() untuk pengecekan

    // Kembalikan response dalam format JSON
    if ($isAlreadyBooked) {
        return response()->json([
            'isAlreadyBooked' => true,
            'message' => 'Waktu sudah dipesan untuk jasa ini.'
        ]);
    } else {
        return response()->json([
            'isAlreadyBooked' => false,
            'message' => 'Waktu tersedia untuk dipesan.'
        ]);
    }
}

// public function checkAvailability(Request $request)
// {
//     $validatedData = $request->validate([
//         'date' => 'required|date',
//         'time' => 'required',
//         'jasa_id' => 'required|integer',
//     ]);

//     $date = $validatedData['date'];
//     $time = $validatedData['time'];
//     $jasaId = $validatedData['jasa_id'];

//     $isAlreadyBooked = Order::where('jasa_id', $jasaId)
//                             ->where('date', $date)
//                             ->where('time', $time)
//                             ->exists();

//     return response()->json(['isAlreadyBooked' => $isAlreadyBooked]);
// }


    

    public function invoice($id)
{
    // Contoh di controller
    Carbon::setLocale('id');

    $order = Order::findOrFail($id);
    $jadwal = Jadwal::where('id_jasa', $order->jasa_id)->first(); 
    $jasa = Jasa::find($order->jasa_id); // Misalnya mengambil jasa berdasarkan id
    return view('servis.invoice', compact('order','jadwal','jasa'));
}

}
