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

Route::get('/welcome', function () {
    return view('welcome');
});

//Route::get('/login', 'AuthController@login');
//Route::post('/postlogin', 'AuthController@postlogin');

//Home
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//Resources
Route::resources([
    'menu' => 'MenuController',
    'meja' => 'MejaController',
    'pesanan' => 'PesananController',
    'pesanan/{id}/detail' => 'DetailPesananController',
    'transaksi' => 'TransaksiController',
    'laporan' => 'LaporanController',
    'user' => 'UserController'
]);

Route::get('pesanan/{id}/detail/edit/{id}' ,'DetailPesananController@edit');

//Total
Route::get('pesanan/total/{id}', 'PesananController@getTotal');
Route::get('pesanan/json/{id}', 'PesananController@getJson');


