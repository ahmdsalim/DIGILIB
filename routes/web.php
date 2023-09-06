<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoleksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BacaController;

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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/search', [BukuController::class, 'search'])->name('book.search');

Route::get('/buku/terbaru', [BukuController::class, 'bukuterbaru'])->name('bukuterbaru');
Route::get('/buku/terpopuler', [BukuController::class, 'bukuterpopuler'])->name('bukuterpopuler');

Auth::routes();

Route::middleware('guest')->group(function() {
	Route::get('register/sekolah', [App\Http\Controllers\Auth\RegisterController::class, 'showFormSekolah'])->name('register.sekolah');
	Route::get('register/siswa', [App\Http\Controllers\Auth\RegisterController::class, 'showFormSiswa'])->name('register.siswa');
	Route::get('register/guru', [App\Http\Controllers\Auth\RegisterController::class, 'showFormGuru'])->name('register.guru');
	Route::post('register/sekolah/store', [App\Http\Controllers\Auth\RegisterController::class, 'registerSekolah'])->name('register.sekolah.store');
	Route::post('register/siswa/store', [App\Http\Controllers\Auth\RegisterController::class, 'registerSiswa'])->name('register.siswa.store');
	Route::post('register/guru/store', [App\Http\Controllers\Auth\RegisterController::class, 'registerGuru'])->name('register.guru.store');
	Route::get('register/success', [App\Http\Controllers\Auth\RegisterController::class, 'registerSuccess'])->name('register.success');
	Route::get('register/verify/resend', [App\Http\Controllers\Auth\RegisterController::class, 'showResend'])->name('register.show.resend');
	Route::post('register/verify/resend', [App\Http\Controllers\Auth\RegisterController::class, 'resendEmail'])->name('register.verify.resend');
	Route::get('reset-email', [App\Http\Controllers\Auth\RegisterController::class, 'showResetEmail'])->name('reset.email.show');
	Route::post('reset-email', [App\Http\Controllers\Auth\RegisterController::class, 'resetEmail'])->name('reset.email.post');
	Route::get('users/account/aktivasi', [UserController::class, 'aktivasi'])->name('users.aktivasi');
});	

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/dashboard-sekolah', [App\Http\Controllers\HomeController::class, 'homesekolah'])->name('home.sekolah');

Route::resource('sekolah', SekolahController::class);

Route::prefix('api')->middleware('auth')->group(function() {
	Route::get('getSekolah', [SekolahController::class, 'getSekolah'])->name('api.getSekolah');
	Route::get('getSiswa', [SiswaController::class, 'getSiswa'])->name('api.getSiswa');
	Route::get('getGuru', [GuruController::class, 'getGuru'])->name('api.getGuru');
	Route::post('read/save',[BacaController::class,'save'])->name('api.read.save');
	Route::post('collection/collect', [KoleksiController::class, 'collect'])->name('api.collection.collect');
	Route::post('collection/uncollect', [KoleksiController::class, 'uncollect'])->name('api.collection.uncollect');
});
Route::controller(BukuController::class)->group(function () {

    Route::get('/request-publish', [BukuController::class, 'request'])->name('buku.request');
    Route::put('/buku/request/{id}', [BukuController::class, 'requestUpdate'])->name('buku.requestUpdate');
    Route::put('/buku/resend/{slug}', [BukuController::class, 'resend'])->name('buku.resend');
    Route::resource('buku', BukuController::class);
});
    
Route::get('detailbuku/{id}/{slug}', [BukuController::class, 'showdetail'])->name('buku.detailbuku');
Route::resource('kategori', KategoriController::class);

Route::resource('users', UserController::class);
Route::get('/profile', [UserController::class, 'showProfile'])->name('users.profile');
Route::get('/profilepembaca', [UserController::class, 'showProfilePembaca'])->name('pembaca.profile');
Route::get('/change-password', [UserController::class, 'showChangePassword'])->name('users.changepassword.show');
Route::post('/change-password', [UserController::class, 'changePassword'])->name('users.changepassword.store');
Route::get('/change-passwordpembaca', [UserController::class, 'showChangePasswordPembaca'])->name('pembaca.changepassword.show');
Route::post('/change-passwordpembaca', [UserController::class, 'changePasswordPembaca'])->name('pembaca.changepassword.store');


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

Route::name('sekolah.')->group(function() {
	Route::resource('siswa', SiswaController::class)->except('show');
	Route::resource('guru', GuruController::class)->except('show');
});

Route::get('baca/{id}/{slug}', [BacaController::class, 'read'])->name('read');

Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi');
Route::get('/createkoleksi/{id}', [KoleksiController::class, 'create']);

Route::get('/terakhirdibaca', [BacaController::class, 'indexpembaca'])->name('terakhirdibaca'); 

Route::get('list-pembaca', [BacaController::class, 'index'])->name('reader.index');
Route::get('list-pembaca/{id}/detail', [BacaController::class, 'detail'])->name('reader.detail');