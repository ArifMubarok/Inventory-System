<?php

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

Route::get('/', function () {
    return view('index', [
        "title" => "SIM Inventaris : msInventaris | Login"
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "SIM Inventaris : msInventaris",
        "judul" => "Dashboard"
    ]);
});

Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);
