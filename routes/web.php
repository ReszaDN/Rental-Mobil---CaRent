<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\admin\LoginAdminController;
use App\Http\Controllers\Auth\admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BookingController;




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


Route::get('/', [WelcomeController::class, 'index']);


//KONSUMEN
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/booking/{id}', [BookingController::class, 'create']);
Route::post('/booking-mobil/{id}', [BookingController::class, 'store']);
Route::get('/list-booking', [BookingController::class, 'showBK']);
Route::get('/bayar/{kode:kode_booking}/konfirmasi', [BookingController::class, 'bayarBK']);
Route::post('/bayar/{kode:kode_booking}', [BookingController::class, 'prosesBayar']);


//ADMIN
Route::get('/admin-login', [LoginAdminController::class, 'index']);
Route::post('/admin-login', [LoginAdminController::class, 'prosesLogin']);
Route::get('/logout', [LoginAdminController::class, 'logout']);
Route::get('/admin-home', [DashboardController::class, 'index']);
Route::get('/admin-pengambilan', [DashboardController::class, 'Pengambilan']);
Route::get('/admin-pengembalian', [DashboardController::class, 'Pengembalian']);
Route::get('/admin-list-mobil', [DashboardController::class, 'listMobil']);
Route::get('/admin-tambah-mobil', [DashboardController::class, 'formTambah']);
Route::post('/tambah-mobil', [DashboardController::class, 'ProsesTambah']);
Route::get('/admin-list-konsumen', [DashboardController::class, 'listKonsumen']);
Route::get('/admin-list-booking', [DashboardController::class, 'listBooking']);
Route::get('/detail/{id}/konfirmasi', [DashboardController::class, 'info']);
Route::post('/detail/{id}', [DashboardController::class, 'acceptBK']);
Route::get('/admin-cetak', [DashboardController::class, 'cetak']);
