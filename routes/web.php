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

Route::get('admin/absensi/bulan', [App\Http\Controllers\LaporanAbsensi::class, 'getbulan']);
Route::resource('admin/izin', App\Http\Controllers\IzinController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('roleuser')->name('home');
Route::get('admin/absensi/tidakhadirhariini', [App\Http\Controllers\AbsensiController::class, 'tidakhadirhariini']);
Route::get('admin/absensi/tidakhadirtigahari', [App\Http\Controllers\AbsensiController::class, 'tidakhadirtigahari']);
#admin
Route::get('admin/kinerja/getdata', [App\Http\Controllers\KinerjaController::class, 'getdata']);
Route::get('admin/kinerja/penghargaan', [App\Http\Controllers\KinerjaController::class, 'penghargaan']);
Route::get('/admin/absensi/ubah', [App\Http\Controllers\AbsensiController::class, 'ubah'])->name('ubah');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index']);
Route::get('/admin/absensi/riwayat', [App\Http\Controllers\AbsensiController::class, 'riwayat']);
Route::post('/admin/absensi/ubahabsensi', [App\Http\Controllers\AbsensiController::class, 'ubahAbsensi'])->name('ubah');
Route::resource('admin/rombel', App\Http\Controllers\RombelControllerController::class);
Route::resource('admin/kinerja', App\Http\Controllers\KinerjaController::class);
Route::resource('admin/siswa', App\Http\Controllers\SiswaController::class);
Route::resource('admin/absensi', App\Http\Controllers\AbsensiController::class);
Route::resource('adminguru', App\Http\Controllers\GuruController::class);
Route::resource('admin/poin', App\Http\Controllers\PoinController::class);
Route::post('admin/absensi/search', [App\Http\Controllers\AbsensiController::class, 'search'])->name('search');
Route::post('admin/absensi/kirim', [App\Http\Controllers\AbsensiController::class, 'kirim'])->name('admin.absensi');
Route::post('admin/absensi/ubah', [App\Http\Controllers\AbsensiController::class, 'ubahStore'])->name('admin.absensi.ubahstore');
Route::post('admin/absensi/absensudah', [App\Http\Controllers\AbsensiController::class, 'absensudah'])->name('sudah');
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
