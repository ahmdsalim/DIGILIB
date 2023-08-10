<?php

use App\Http\Controllers\BukuController;
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
Route::resource('buku', BukuController::class);
Route::resource('user', UserController::class);

Route::resource('users', UserController::class);

Route::prefix('owner')->name('owner.')->group(function() {
	Route::get('users', [UserController::class, 'ownerIndex'])->name('users.index');
	Route::get('users/create', [UserController::class, 'ownerCreate'])->name('users.create');
	Route::get('users/{user}', [UserController::class, 'ownerShow'])->name('users.show');
	Route::post('users/store', [UserController::class, 'ownerStore'])->name('users.store');
	Route::get('users/edit/{user}', [UserController::class, 'ownerEdit'])->name('users.edit');
	Route::put('users/update/{user}', [UserController::class, 'ownerUpdate'])->name('users.update');
	Route::delete('users/delete/{user}', [UserController::class, 'ownerDestroy'])->name('users.destroy');
});
Route::prefix('api')->middleware('auth')->group(function() {
	Route::get('getSekolah', [SekolahController::class, 'getSekolah'])->name('api.getSekolah');
	Route::get('getSiswa', [SiswaController::class, 'getSiswa'])->name('api.getSiswa');
	Route::get('getGuru', [GuruController::class, 'getGuru'])->name('api.getGuru');
});