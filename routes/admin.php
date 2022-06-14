<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // require base_path('vendor/laravel/fortify/routes/routes.php');

    Route::group(['namespace' => 'Admin', 'middleware' => ['role:admin|manager']], function () {
        Route::get('/', function () {
            return redirect(route('admin.dashboard'));
        });

        Route::view('/dashboard', 'pages.admin.dashboard')->name('dashboard');

        Route::group(['namespace' => 'Master', 'prefix' => 'master', 'as' => 'master.'], function () {
            Route::resource('/data-kategori', 'KategoriController');
            Route::resource('/data-satuan', 'SatuanController');
            Route::resource('/data-merk', 'MerkController');
            // Route::resource('/data-merk', 'MerkController');
            Route::resource('/data-supplier', 'SupplierController');
            Route::resource('/data-barang', 'DataBarangController');
        });

        Route::group(['namespace' => 'Settings', 'prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::resource('/departemen', 'DepartemenController');
            Route::resource('/bagian', 'BagianController');
            Route::resource('/users', 'UserController');
            Route::resource('/lokasi', 'LokasiController');
        });

        Route::group(['namespace' => 'Barang', 'prefix' => 'barang', 'as' => 'barang.'], function () {
            Route::resource('/pengadaan-barang', 'PengadaanController');
            Route::resource('/penempatan-barang', 'PenempatanController');
            Route::resource('/barang', 'BarangController');
            Route::resource('/barang-nonaktif', 'BarangNonAktifController');
        });

        // Route::resource('/settings', 'SettingController');
    });
});
