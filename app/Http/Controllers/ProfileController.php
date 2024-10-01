<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Jadwal;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function admin()
        {
            Carbon::setLocale('id');
        $orders = Order::all();
        return view('profile.adminmanage', compact('orders'));
        }
    public function profile()
        {
            return view('profile.profile');
        }
        
        public function editprofile()
        {
            return view('profile.editprofile');
        }

        public function updateProfile(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:8', // Password menjadi opsional
        ]);

        // Ambil pengguna yang sedang masuk
        $user = Auth::user();
        
        // Perbarui nama dan email pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;


        // Perbarui password jika ada input password baru
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect kembali ke halaman profil
        return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
    public function toggleStatus($id)
{
    $order = Order::find($id);
    if ($order) {
        // Ganti status antara 'Paid' dan 'Unpaid'
        $order->status = $order->status == 'Paid' ? 'Unpaid' : 'Paid';
        $order->save();

        return response()->json([
            'success' => true,
            'newStatus' => $order->status
        ]);
    }

    return response()->json(['success' => false], 400);
}
public function uploadBukti(Request $request, $id)
{
    $request->validate([
        'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
    ]);

    $order = Order::find($id);
    
    if ($order) {
        // Upload bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/bukti_pembayaran', $filename);

            // Simpan path bukti pembayaran ke database
            $order->bukti_pembayaran = $filename;
            $order->save();

            return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah!');
        }
    }

    return redirect()->back()->with('error', 'Gagal mengunggah bukti pembayaran.');
}
public function exportPdf(Request $request)
{
    Carbon::setLocale('id');
    
    // Dapatkan bulan yang dipilih dari request
    $month = $request->input('month');

    // Filter pesanan berdasarkan bulan yang dipilih
    if ($month) {
        $orders = Order::whereMonth('date', $month)->get();
        // Ambil nama bulan berdasarkan bulan yang dipilih
        $monthName = \Carbon\Carbon::create()->month($month)->translatedFormat('F');
    } else {
        $orders = Order::all();
        $monthName = 'Semua_Bulan';
    }

    // Generate PDF menggunakan view 'profile.orders-pdf'
    $pdf = PDF::loadView('profile.orders-pdf', compact('orders'))
              ->setPaper('a4', 'portrait'); // Mengatur ukuran dan orientasi halaman

    // Unduh file dengan nama sesuai bulan yang dipilih
    return $pdf->download('orders_' . $monthName . '_' . \Carbon\Carbon::now()->year . '.pdf');
}
public function exportExcel(Request $request)
{
    $month = $request->input('month');

    // Ambil nama bulan untuk penamaan file
    $monthName = $month ? \Carbon\Carbon::create()->month($month)->translatedFormat('F') : 'Semua_Bulan';

    return Excel::download(new OrdersExport($month), 'orders_' . $monthName . '_' . \Carbon\Carbon::now()->year . '.xlsx');
}
}