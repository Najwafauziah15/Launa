<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;

// Home
Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('role');
Route::get('/homeOwner', [HomeController::class, 'index3'])->name('homeOwner');
Route::get('/homeKasir', [HomeController::class, 'index2'])->name('homeKasir');

// Outlet
Route::resource('outlet', OutletController::class)->middleware('auth');
Route::delete('{id}/outlet/delete' ,  [OutletController::class, 'destroy']);

// Pengguna atau member
Route::resource('pengguna', PenggunaController::class)->middleware('auth');
Route::delete('{id}/pengguna/delete' ,  [PenggunaController::class, 'destroy']);

// Paket atau Produk
Route::resource('paket', PaketController::class)->middleware('auth');
Route::delete('{id}/paket/delete' ,  [PaketController::class, 'destroy']);

// Registrasi
Route::resource('/registrasi', RegistrasiController::class)->middleware('auth');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::delete('{id}/registrasi/delete' ,  [RegistrasiController::class, 'destroy']);

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Transaksi
Route::resource('transaksi', TransaksiController::class);