<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // require base_path('vendor/laravel/fortify/routes/routes.php');

    Route::group(['namespace' => 'Admin', 'middleware' => ['role:admin|manager']], function () {
        Route::get('/', function () {
            return redirect(route('admin.dashboard'));
        });

        Route::view('/dashboard', 'pages.admin.dashboard')->name('dashboard');

        Route::resource('/users', 'UserController');
        Route::resource('/settings', 'SettingController');
        Route::resource('/data-kategori', 'KategoriController');
        Route::resource('/departemen', 'DepartemenController');
        Route::resource('/data-satuan', 'SatuanController');
    });
});
