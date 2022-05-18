<?php


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
    return redirect('/admin');
})->middleware('auth');

Route::get('/token', function () {
    return csrf_token();
});

Route::get('/edit-profile', 'ProfileController@edit')->name('edit-profile');

Route::group(['middleware' => 'auth:web', 'as' => 'user.'], function () {
});

require __DIR__ . '/demo.php';
