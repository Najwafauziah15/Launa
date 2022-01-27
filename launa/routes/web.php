<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;

// Home
Route::get('/home', [HomeController::class, 'index4']);
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('role');
Route::get('/homeOwner', [HomeController::class, 'index3'])->name('homeOwner');
Route::get('/homeKasir', [HomeController::class, 'index2'])->name('homeKasir');

// Outlet
Route::resource('outlet', OutletController::class)->middleware('role');
Route::delete('{id}/outlet/delete' ,  [OutletController::class, 'destroy']);

// Member
Route::resource('pengguna', PenggunaController::class)->middleware('role');
Route::delete('{id}/pengguna/delete' ,  [PenggunaController::class, 'destroy']);

// Pengguna atau user
Route::resource('user', UserController::class)->middleware('role');
Route::delete('{id}/user/delete' ,  [UserController::class, 'destroy']);

// Paket atau Produk
Route::resource('paket', PaketController::class)->middleware('role');
Route::delete('{id}/paket/delete' ,  [PaketController::class, 'destroy']);

// Registrasi
Route::resource('/registrasi', RegistrasiController::class)->middleware('guest');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::delete('{id}/registrasi/delete' ,  [RegistrasiController::class, 'destroy']);

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Transaksi
Route::resource('transaksi', TransaksiController::class);