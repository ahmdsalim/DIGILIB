<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('landing');
});

Route::get('/all/buku', function () {
    return view('bukuterbaru');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('sekolah', SekolahController::class);
<<<<<<< HEAD
Route::resource('buku', BukuController::class);
Route::get('/detailbuku', [BukuController::class, 'show']);
Route::resource('user', UserController::class);
=======
// Route::resource('buku', BukuController::class);
>>>>>>> origin/main

Route::controller(BukuController::class)->group(function () {
    // Route::resource('buku/test', BukuController::class);
    // Route::get('/buku/test', [BukuController::class, 'test'])->name('buku.test');
    Route::get('/buku/request', [BukuController::class, 'request'])->name('buku.request');
    Route::put('/buku/request/{id}', [BukuController::class, 'requestUpdate'])->name('buku.requestUpdate');
    Route::resource('buku', BukuController::class);
});

Route::resource('user', UserController::class);
Route::resource('kategori', KategoriController::class);

Route::resource('users', UserController::class);
