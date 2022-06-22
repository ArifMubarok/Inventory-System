<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // require base_path('vendor/laravel/fortify/routes/routes.php');

    Route::group(['namespace' => 'Admin', 'middleware' => ['role:admin|manager']], function () {
        Route::get('/', function () {
            return redirect(route('admin.dashboard'));
        });

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

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
        });

        Route::group(['namespace' => 'Utilitas', 'prefix' => 'utilitas', 'as' => 'utilitas.'], function () {
            Route::resource('/backup-database', 'BackupController');
            Route::resource('/restore-database', 'RestoreController');
        });

        // Route::resource('/settings', 'SettingController');
    });
});
