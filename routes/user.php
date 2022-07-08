<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    // require base_path('vendor/laravel/fortify/routes/routes.php');
    
    Route::group(['namespace' => 'User', 'middleware' => ['role:user']], function () {

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
    });
});