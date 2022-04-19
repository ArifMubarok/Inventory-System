<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\DataMerkController;
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


Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "SIM Inventaris : msInventaris",
        "judul" => "msInventaris"
    ]);
});

Route::resource('/kategori-barang', KategoriBarangController::class)->middleware('auth');

Route::resource('/satuan-barang', SatuanBarangController::class)->middleware('auth');

Route::resource('/data-merk', DataMerkController::class)->middleware('auth');
