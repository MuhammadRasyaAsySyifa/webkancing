<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function admin()
        {
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
}