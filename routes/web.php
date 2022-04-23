<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataMerkController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DataUserController;

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


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth', 'CekRole:admin']], function() {
    Route::resource('/kategori-barang', KategoriBarangController::class);
    Route::resource('/satuan-barang', SatuanBarangController::class);
    Route::resource('/data-merk', DataMerkController::class);
    Route::resource('/data-barang', DataBarangController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/bagian', BagianController::class);
    Route::resource('/departemen', DepartemenController::class);
    Route::resource('/data-user', DataUserController::class);
    Route::resource('/lokasi', LokasiController::class);
});

Route::group(['middleware' => ['auth', 'CekRole:admin,user,sarpras']], function() {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
});
