<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Middleware\AdminMiddleware;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;


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
Route::resource('gallery', GalleryController::class);
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'gallery'])->name('gallery.gallery');
Route::get('/service', [App\Http\Controllers\JasaController::class, 'service'])->name('service');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::get('/editprofile', [App\Http\Controllers\ProfileController::class, 'editprofile'])->name('editprofile');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');
Route::get('/homemanage', [App\Http\Controllers\HomeController::class, 'homemanage'])->middleware('admin');
Route::get('/pemesanan/{id}', [App\Http\Controllers\OrderController::class, 'pemesanan'])->name('pemesanan');
Route::post('/checkout',[App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
Route::get('/invoice/{id}',[App\Http\Controllers\OrderController::class, 'invoice'])->name('invoice');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/adminmanage',[App\Http\Controllers\ProfileController::class, 'admin'])->name('admin');
Route::get('/manage', [App\Http\Controllers\HomeController::class, 'manage'])->middleware('admin');
Route::resource('servis', JasaController::class);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
