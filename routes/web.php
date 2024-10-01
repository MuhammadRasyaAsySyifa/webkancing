<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Middleware\AdminMiddleware;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JadwalController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;     
use App\Http\Controllers\PromoController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home.home');
// });
// Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
// Route::get('/gallery/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
// Route::post('/gallery', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
// Route::get('/gallery/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
// Route::put('/gallery/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
// Route::delete('/gallery/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
// Route::get('/gallery/tampilkan/{id}', [App\Http\Controllers\HomeController::class, 'showImage'])->name('gallery.tampilkan');
// Route::get('/manage', [App\Http\Controllers\HomeController::class, 'manage'])->middleware('admin');

//promo
Route::resource('promo', PromoController::class);


//gallery
Route::resource('gallery', GalleryController::class);
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'gallery'])->name('gallery.gallery');

//profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::get('/editprofile', [App\Http\Controllers\ProfileController::class, 'editprofile'])->name('editprofile');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');

Route::get('/about', function () {
    return view('about.about');
});

//servis
Route::get('/service', [App\Http\Controllers\JasaController::class, 'service'])->name('service');
Route::get('/homemanage', [App\Http\Controllers\HomeController::class, 'homemanage'])->middleware('admin');
Route::get('/deskripsilayanan/{id}/isidata', [App\Http\Controllers\OrderController::class, 'isidata'])->name('isidata');
Route::post('/checkout2',[App\Http\Controllers\OrderController::class, 'checkout2'])->name('checkout2');
Route::get('/invoice/{id}',[App\Http\Controllers\OrderController::class, 'invoice'])->name('invoice');
Route::get('/deskripsilayanan/{id}', [App\Http\Controllers\OrderController::class, 'deskripsilayanan'])->name('deskripsi.layanan');
Route::get('/deskripsilayanan/{id}/isiwaktu', [App\Http\Controllers\OrderController::class, 'isiwaktu'])->name('isiwaktu');
Route::post('/checkout1',[App\Http\Controllers\OrderController::class, 'checkout1'])->name('checkout1');
// Tambahkan ke routes/web.php
Route::post('/check-availability',[App\Http\Controllers\OrderController::class, 'checkAvailability'])->name('checkAvailability');

//jadwal
Route::resource('jadwal', JadwalController::class);
Route::post('/toggle-status/{id}', [ProfileController::class, 'toggleStatus']);
Route::post('/upload-bukti/{id}', [ProfileController::class, 'uploadBukti'])->name('upload-bukti');
Route::get('/export-pdf', [ProfileController::class, 'exportPdf'])->name('exportpdf');
Route::get('/export-excel', [ProfileController::class, 'exportExcel'])->name('exportexcel');

//login dengan google
Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();
    
    // Cek apakah pengguna sudah ada berdasarkan email
    $user = User::firstOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password' => Hash::make(Str::random(24)), // Hash password acak
    ]);

    // Login pengguna
    Auth::login($user);

    return redirect('/');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/adminmanage',[App\Http\Controllers\ProfileController::class, 'admin'])->name('admin');
Route::get('/manage', [App\Http\Controllers\HomeController::class, 'manage'])->middleware('admin');
Route::resource('servis', JasaController::class);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
