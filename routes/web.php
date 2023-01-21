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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('roleuser')->name('home');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index']);
Route::get('/guru/dashboard', [App\Http\Controllers\GuruDashboardController::class, 'index']);
Route::get('/ortu/dashboard', [App\Http\Controllers\OrtuDashboardController::class, 'index']);
Route::get('/ortu/absensi', [App\Http\Controllers\OrtuDashboardController::class, 'absensi']);
Route::get('/ortu/kinerja', [App\Http\Controllers\OrtuDashboardController::class, 'kinerja']);
Route::get('/ortu/profil', [App\Http\Controllers\OrtuDashboardController::class, 'profil']);
