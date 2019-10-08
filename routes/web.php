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
    return view('index');
});

Route::get('welcome', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('hotel_admin', 'HotelController');

Route::get('Daftar_Hotel', 'HotelCatalog@index');
Route::get('Detail_Hotel/{id}', 'HotelCatalog@show');
