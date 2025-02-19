<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produk;
use App\Http\Controllers\Keranjang;
use App\Http\Controllers\Transaksi;
use App\Http\Controllers\User;

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

Route::get('/', [Produk::class, 'index']);
Route::get('/produk', [Produk::class, 'index']);
Route::get('/produk/form', [Produk::class, 'create']);
Route::get('/produk/form/{id}', [Produk::class, 'edit']);
Route::get('/keranjang', [Keranjang::class, 'index']);

Route::get('/checkout', [Transaksi::class, 'checkout']);
Route::post('/checkout', [Transaksi::class, 'store']);

Route::get('/transaksi', [Transaksi::class, 'index']);

Route::get('/laporan', [Transaksi::class, 'laporan']);


Route::post('/produk', [Produk::class, 'store_no_api']);
Route::get('/login', [User::class, 'login']);
Route::post('/login', [User::class, 'loginProcess']);
Route::get('/logout', [User::class, 'logout']);

