<?php

// app/Http/Controllers/JadwalController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Jasa;
use Carbon\Carbon;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all()->map(function($jadwal) {
            $jadwal->jam = Carbon::parse($jadwal->jam, 'UTC')->setTimezone('Asia/Makassar')->format('H:i');
            return $jadwal;
        });
    
        return view('jadwal.index', ['jadwals' => $jadwals]);
    }
    

    public function create()
    {
        $jasas = Jasa::all();
        return view('jadwal.create', compact('jasas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jasa' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'durasi' => 'required|integer|min:1'
        ]);
    
        // Mengonversi tanggal dan waktu input ke zona waktu WITA (Asia/Makassar)
        $tanggalInWITA = Carbon::createFromFormat('Y-m-d H:i', $request->input('tanggal') . ' ' . $request->input('jam'), 'Asia/Makassar');
    
        // Konversi ke UTC sebelum menyimpan
        $tanggalInUTC = $tanggalInWITA->setTimezone('UTC');
    
        // Menyimpan data ke database dengan waktu dalam UTC
        Jadwal::create([
            'id_jasa' => $request->input('id_jasa'),
            'tanggal' => $tanggalInUTC->toDateString(),
            'jam' => $tanggalInUTC->toTimeString(),
            'durasi' => $request->input('durasi'),
        ]);
    
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }
    
public function edit($id)
{
    $jadwal = Jadwal::findOrFail($id);
    $jasas = Jasa::all();
    $jadwal->jam = Carbon::parse($jadwal->jam, 'UTC')->setTimezone('Asia/Makassar')->format('H:i');
    return view('jadwal.edit', compact('jadwal', 'jasas'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'id_jasa' => 'required',
        'tanggal' => 'required|date',
        'jam' => 'required|date_format:H:i',
        'durasi' => 'required|integer|min:1', // Validate durasi
    ]);

    $jadwal = Jadwal::findOrFail($id);

    // Mengonversi tanggal dan waktu input ke zona waktu WITA (Asia/Makassar)
    $tanggalInWITA = Carbon::createFromFormat('Y-m-d H:i', $request->input('tanggal') . ' ' . $request->input('jam'), 'Asia/Makassar');

    // Konversi ke UTC sebelum menyimpan
    $tanggalInUTC = $tanggalInWITA->setTimezone('UTC');

    // Update jadwal with new data
    $jadwal->update([
        'id_jasa' => $request->input('id_jasa'),
        'tanggal' => $tanggalInUTC->toDateString(),
        'jam' => $tanggalInUTC->toTimeString(),
        'durasi' => $request->input('durasi'), // Update durasi value
    ]);

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate.');
}


public function destroy($id)
{
    $jadwal = Jadwal::findOrFail($id);
    $jadwal->delete();

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
}
}

