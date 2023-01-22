<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('roleuser')->name('home');
#admin
Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index']);
Route::resource('admin/rombel', App\Http\Controllers\RombelControllerController::class);
Route::resource('admin/siswa', App\Http\Controllers\SiswaController::class);
Route::resource('admin/absensi', App\Http\Controllers\AbsensiController::class);
#ortu routes
Route::get('/ortu/dashboard', [App\Http\Controllers\OrtuDashboardController::class, 'index']);
Route::get('/ortu/absensi', [App\Http\Controllers\OrtuDashboardController::class, 'absensi']);
Route::get('/ortu/kinerja', [App\Http\Controllers\OrtuDashboardController::class, 'kinerja']);
Route::get('/ortu/profil', [App\Http\Controllers\OrtuDashboardController::class, 'profil']);
#guru routes
Route::get('/guru/detailabsensi/{id}', [App\Http\Controllers\GuruDashboardController::class, 'detailabsensi'])->name('guru.detailabsensi');
Route::get('/guru/dashboard', [App\Http\Controllers\GuruDashboardController::class, 'index']);
Route::get('/guru/profil', [App\Http\Controllers\GuruDashboardController::class, 'profil']);
Route::get('/guru/absensi', [App\Http\Controllers\GuruDashboardController::class, 'absensi']);
Route::post('/guru/absensi/store', [App\Http\Controllers\GuruDashboardController::class, 'store'])->name('guru.store');
