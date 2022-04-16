<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriBarangController;
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


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware('auth');

Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);

Route::resource('/data-merk', []);
