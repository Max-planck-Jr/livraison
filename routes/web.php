<?php

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

//Authentication
Route::get('/', 'HomeController@login')->name('login');
Route::post('/', 'HomeController@authLogin')->name('loginAction');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', 'HomeController@logout')->name('logout');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::resource("clients", "ClientsController");
});
