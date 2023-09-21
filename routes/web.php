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
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Siswa;

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
	Route::get('register/sekolah', [RegisterController::class, 'showFormSekolah'])->name('register.sekolah');
	Route::get('register/siswa', [RegisterController::class, 'showFormSiswa'])->name('register.siswa');
	Route::get('register/guru', [RegisterController::class, 'showFormGuru'])->name('register.guru');
	Route::post('register/sekolah/store', [RegisterController::class, 'registerSekolah'])->name('register.sekolah.store');
	Route::post('register/siswa/store', [RegisterController::class, 'registerSiswa'])->name('register.siswa.store');
	Route::post('register/guru/store', [RegisterController::class, 'registerGuru'])->name('register.guru.store');
	Route::get('register/verify/resend', [RegisterController::class, 'showResend'])->name('register.show.resend');
	Route::post('register/verify/resend', [RegisterController::class, 'resendEmail'])->middleware('throttle:2,1')->name('register.verify.resend');
	// Route::get('reset-email', [RegisterController::class, 'showResetEmail'])->name('reset.email.show');
	// Route::post('reset-email', [RegisterController::class, 'resetEmail'])->name('reset.email.post');
	Route::get('auth/aktivasi', [UserController::class, 'aktivasi'])->name('users.aktivasi');
	Route::get('auth/login-action', [RegisterController::class, 'login_action'])->name('login.action');
});	

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('/dashboard-sekolah', [App\Http\Controllers\HomeController::class, 'homesekolah'])->name('home.sekolah');
    
    Route::resource('sekolah', SekolahController::class);
    Route::get('/export-sekolah', [SekolahController::class, 'export'])->name('sekolah.export');

    Route::controller(BukuController::class)->group(function () {
        Route::get('/request-publish', [BukuController::class, 'request'])->name('buku.request');
        Route::put('/buku/request/{id}', [BukuController::class, 'requestUpdate'])->name('buku.requestUpdate');
        Route::put('/buku/resend/{slug}', [BukuController::class, 'resend'])->name('buku.resend');
        Route::resource('buku', BukuController::class);
        Route::get('buku/cetak-pdf', [BukuController::class, 'cetakPdf'])->name('buku.cetak.pdf');
        Route::get('/export-buku', [BukuController::class, 'export'])->name('buku.export');
        Route::get('/export-req-posting', [BukuController::class, 'exportReqPosting'])->name('buku.req-posting.export');
        
    });

    Route::get('/export-detail-buku', [BukuController::class, 'exportDetail'])->name('buku.export-detail');
    Route::resource('kategori', KategoriController::class);

    Route::resource('users', UserController::class);
    Route::get('/export-user', [UserController::class, 'export'])->name('users.export');
    Route::get('user/cetak-pdf', [UserController::class, 'cetakPdf'])->name('user.cetak.pdf');
    
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.profile');
    Route::get('/change-password', [UserController::class, 'showChangePassword'])->name('users.changepassword.show');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('users.changepassword.store');

    Route::get('list-pembaca', [BacaController::class, 'index'])->name('reader.index');
    Route::get('list-pembaca/{id}/detail', [BacaController::class, 'detail'])->name('reader.detail');
    Route::get('/export-pembaca', [BacaController::class, 'export'])->name('baca.export');
    Route::get('pembaca/cetak-pdf', [BacaController::class, 'cetakPdf'])->name('pembaca.cetak.pdf');
});

Route::prefix('api')
    ->middleware('auth')
    ->group(function () {
        Route::get('getSekolah', [SekolahController::class, 'getSekolah'])->name('api.getSekolah');
        Route::get('getSiswa', [SiswaController::class, 'getSiswa'])->name('api.getSiswa');
        Route::get('getGuru', [GuruController::class, 'getGuru'])->name('api.getGuru');
        Route::post('read/save', [BacaController::class, 'save'])->name('api.read.save');
        Route::post('collection/collect', [KoleksiController::class, 'collect'])->name('api.collection.collect');
        Route::post('collection/uncollect', [KoleksiController::class, 'uncollect'])->name('api.collection.uncollect');
    });

Route::get('akun/profil', [UserController::class, 'showProfilePembaca'])->name('pembaca.profile');
Route::get('akun/ubah-password', [UserController::class, 'showChangePasswordPembaca'])->name('pembaca.changepassword.show');
Route::post('akun/ubah-password', [UserController::class, 'changePasswordPembaca'])->name('pembaca.changepassword.store');

Route::prefix('sekolah')
    ->middleware('auth')
    ->group(function () {
        Route::get('{sekolah}/siswa', [SiswaController::class, 'getSiswaBySekolah'])->name('owner.siswa.index');
        Route::get('siswa/{siswa}/edit', [SiswaController::class, 'editSiswa'])->name('owner.siswa.edit');
        Route::put('siswa/{siswa}/update', [SiswaController::class, 'updateSiswa'])->name('owner.siswa.update');
        Route::delete('siswa/{siswa}/delete', [SiswaController::class, 'destroySiswa'])->name('owner.siswa.destroy');
        Route::post('/import-siswa', [SiswaController::class, 'import'])->name('siswa.import');
        Route::get('/error-import-siswa', [SiswaController::class, 'errorImport'])->name('siswa.error-import');
        Route::get('/export-siswa', [SiswaController::class, 'export'])->name('siswa.export');

        Route::get('{sekolah}/guru', [GuruController::class, 'getGuruBySekolah'])->name('owner.guru.index');
        Route::get('guru/{guru}/edit', [GuruController::class, 'editGuru'])->name('owner.guru.edit');
        Route::put('guru/{guru}/update', [GuruController::class, 'updateGuru'])->name('owner.guru.update');
        Route::delete('guru/{guru}/delete', [GuruController::class, 'destroyGuru'])->name('owner.guru.destroy');

        Route::post('/import-guru', [GuruController::class, 'import'])->name('guru.import');
        Route::get('/export-guru', [GuruController::class, 'export'])->name('guru.export');
        
        Route::get('siswa/cetak-pdf', [SiswaController::class, 'cetakPdf'])->name('siswa.cetak.pdf');
        Route::get('/error-import-guru', [GuruController::class, 'errorImport'])->name('guru.error-import');
        Route::get('guru/cetak-pdf', [GuruController::class, 'cetakPdf'])->name('guru.cetak.pdf');
    });

Route::name('sekolah.')->middleware('auth')->group(function () {
    Route::resource('siswa', SiswaController::class)->except('show');
    Route::resource('guru', GuruController::class)->except('show');
});

Route::middleware('auth.user')->group(function(){
    Route::get('baca/{id}/{slug}', [BacaController::class, 'read'])->name('read');
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi');
    Route::get('/daftar-bacaan', [BacaController::class, 'readinglist'])->name('daftarbacaan');
    Route::resource('rating', RatingController::class)->only('store');
});

Route::get('detailbuku/{id}/{slug}', [BukuController::class, 'showdetail'])->name('buku.detailbuku');

// Route::get('/createkoleksi/{id}', [KoleksiController::class, 'create']);

// Route::get('/terakhirdibaca', [BacaController::class, 'indexpembaca'])->name('terakhirdibaca');

// Route::post('/import', [SiswaController::class, 'import'])->name('siswa.import');
// Route::get('/export-siswa', [SiswaController::class, 'export'])->name('siswa.export');