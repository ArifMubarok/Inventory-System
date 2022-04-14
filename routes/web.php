<?php

use App\Http\Controllers\KategoriBarangController;
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
    return view('index', [
        "title" => "SIM Inventaris : msInventaris | Login"
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "SIM Inventaris : msInventaris",
        "judul" => "msInventaris"
    ]);
});

Route::get('KategoriBarang', [KategoriBarangController::class, "index"]);