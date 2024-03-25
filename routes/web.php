<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Middleware\AdminMiddleware;
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

Route::get('/', function () {
    return view('home.welcome');
});
Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
Route::get('/gallery/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/gallery', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/gallery/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::put('/gallery/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::delete('/gallery/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
Route::get('/gallery/tampilkan/{id}', [App\Http\Controllers\HomeController::class, 'showImage'])->name('gallery.tampilkan');
Route::get('/manage', [App\Http\Controllers\HomeController::class, 'manage'])->middleware('admin');
Route::get('/service', [App\Http\Controllers\HomeController::class, 'service'])->name('service');
Route::get('/pemesanan', [App\Http\Controllers\HomeController::class, 'pemesanan'])->name('pemesanan');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::get('/editprofile', [App\Http\Controllers\HomeController::class, 'editprofile'])->name('editprofile');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
