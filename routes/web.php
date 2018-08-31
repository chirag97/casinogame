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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/spin-start', 'GameController@spinStart');
Route::get('/spin-stop', 'GameController@spinStop');
Route::get('/reset-attempts', 'GameController@resetAttempts');

Route::post('/redeem-product', 'GameController@redeemProduct');

Route::get('challenge1','Challenege1Controller@index');
Route::get('challenge2','Challenege2Controller@index');
Route::get('challenge3','Challenege3Controller@index');
Route::get('challenge4','Challenege4Controller@index');
