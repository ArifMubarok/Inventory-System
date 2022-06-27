<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    // require base_path('vendor/laravel/fortify/routes/routes.php');
    
    Route::group(['namespace' => 'User'], function () {
        Route::get('/', function () {
            return redirect(route('user.dashboard'));
        });

        Route::get('/dashboard', 'UserDashboardController@index')->name('dashboard');

        // Route::resource('/users', 'UserController');
        // Route::resource('/settings', 'SettingController');
    });
});