<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'sarpras', 'as' => 'sarpras.'], function () {
    // require base_path('vendor/laravel/fortify/routes/routes.php');
    
    Route::group(['namespace' => 'Sarpras', 'middleware' => ['role:sarpras']], function () {

        Route::group(['prefix' => 'cek-barang', 'as' => 'cek-barang.'], function () {
            Route::get('/', 'CekController@index')->name('index');
            Route::post('/', 'CekController@show')->name('show');
            Route::get('/lapor', 'CekController@lapor')->name('lapor');
            Route::post('/lapor/store', 'CekController@kirim')->name('kirim');
        });

        Route::group(['prefix' => 'laporan-barang', 'as' => 'laporan-barang.'], function () {
            Route::get('/', 'LaporBarangController@index')->name('index');
            Route::get('/{lapor_barang}', 'LaporBarangController@show')->name('show');
            Route::put('/{lapor_barang}', 'LaporBarangController@update')->name('update');
        });

        Route::group(['namespace' => 'Barang', 'prefix' => 'barang', 'as' => 'barang.'], function () {
            Route::resource('/pengadaan-barang', 'PengadaanController');
            Route::resource('/penempatan-barang', 'PenempatanController');
            Route::resource('/barang', 'BarangController');
            Route::resource('/mutasi-lokasi', 'MutasiLokasiController');
            Route::resource('/proses-opname', 'OpnameController');
            Route::resource('/hitung-depresiasi', 'DepresiasiController');
            Route::resource('/cetak-barcode', 'CetakBarcodeController');
            Route::resource('/barang-nonaktif', 'BarangNonAktifController');
        });

        Route::group(['namespace' => 'Laporan', 'prefix' => 'laporan', 'as' => 'laporan.'], function () {
            Route::group(['prefix' => 'laporan-barang', 'as' => 'laporan-barang.'], function () {
                Route::get('/', 'LaporanBarangController@index');
                Route::get('/cetak', 'LaporanBarangController@cetak')->name('cetak');
                Route::get('/export', 'LaporanBarangController@export')->name('export');
            });
            Route::group(['prefix' => 'laporan-pengadaan', 'as' => 'laporan-pengadaan.'], function () {
                Route::get('/', 'LaporanPengadaanController@index');
                Route::get('/cetak', 'LaporanPengadaanController@cetak')->name('cetak');
                Route::get('/export', 'LaporanPengadaanController@export')->name('export');
            });
            Route::group(['prefix' => 'laporan-depresiasi', 'as' => 'laporan-depresiasi.'], function () {
                Route::get('/', 'LaporanDepresiasiController@index');
                Route::get('/cetak', 'LaporanDepresiasiController@cetak')->name('cetak');
                Route::get('/export', 'LaporanDepresiasiController@export')->name('export');
            });
            Route::group(['prefix' => 'laporan-opname', 'as' => 'laporan-opname.'], function () {
                Route::get('/', 'LaporanOpnameController@index');
                Route::get('/cetak', 'LaporanOpnameController@cetak')->name('cetak');
                Route::get('/export', 'LaporanOpnameController@export')->name('export');
            });
            Route::group(['prefix' => 'laporan-barang-nonaktif', 'as' => 'laporan-barang-nonaktif.'], function () {
                Route::get('/', 'LaporanBarangNonaktifController@index');
                Route::get('/cetak', 'LaporanBarangNonaktifController@cetak')->name('cetak');
                Route::get('/export', 'LaporanBarangNonaktifController@export')->name('export');
            });
        });
    });
});