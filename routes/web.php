<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('sekolah', SekolahController::class);
// Route::resource('buku', BukuController::class);

Route::prefix('api')->middleware('auth')->group(function() {
	Route::get('getSekolah', [SekolahController::class, 'getSekolah'])->name('api.getSekolah');
	Route::get('getSiswa', [SiswaController::class, 'getSiswa'])->name('api.getSiswa');
	Route::get('getGuru', [GuruController::class, 'getGuru'])->name('api.getGuru');
});
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

Route::prefix('sekolah')->middleware('auth')->group(function() {
	Route::get('{sekolah}/siswa', [SiswaController::class, 'getSiswaBySekolah'])->name('owner.siswa.index');
	Route::get('siswa/{siswa}/edit', [SiswaController::class, 'editSiswa'])->name('owner.siswa.edit');
	Route::put('siswa/{siswa}/update', [SiswaController::class, 'updateSiswa'])->name('owner.siswa.update');
	Route::delete('siswa/{siswa}/delete', [SiswaController::class, 'destroySiswa'])->name('owner.siswa.destroy');

	Route::get('{sekolah}/guru', [GuruController::class, 'getGuruBySekolah'])->name('owner.guru.index');
	Route::get('guru/{guru}/edit', [GuruController::class, 'editGuru'])->name('owner.guru.edit');
	Route::put('guru/{guru}/update', [GuruController::class, 'updateGuru'])->name('owner.guru.update');
	Route::delete('guru/{guru}/delete', [GuruController::class, 'destroyGuru'])->name('owner.guru.destroy');
});
