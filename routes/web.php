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
    return view('index');
});

Route::get('/dev', function () {
    return view('ongkir.hasil');
});

Route::get('/resi', 'ResiController@index');
Route::post('/resi', 'ResiController@pencarian');

Route::get('/ongkir', 'OngkirController@index');
Route::POST('/ongkir', 'OngkirController@hitungongkir');

Route::get('/ktp', 'KtpController@index');
Route::POST('/ktp', 'KtpController@store');
