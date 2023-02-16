<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\admin\LoginAdminController;
use App\Http\Controllers\Auth\admin\DashboardController;
use App\Http\Controllers\Auth\admin\PeminjamanController;
use App\Http\Controllers\Auth\admin\PengembalianController;


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
    return view('index');
});


//KONSUMEN
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ADMIN
Route::get('/admin-login', [LoginAdminController::class, 'index']);
Route::post('/admin-login', [LoginAdminController::class, 'prosesLogin']);
Route::get('/logout', [LoginAdminController::class, 'logout']);
Route::get('/admin-home', [DashboardController::class, 'index']);
Route::get('/admin-pengambilan', [PeminjamanController::class, 'index']);
Route::get('/admin-pengembalian', [PengembalianController::class, 'index']);
Route::get('/admin-list-mobil', [DashboardController::class, 'listMobil']);
Route::get('/admin-list-konsumen', [DashboardController::class, 'listKonsumen']);
Route::get('/admin-list-booking', [DashboardController::class, 'listBooking']);
Route::get('/admin-cetak', [DashboardController::class, 'cetak']);
