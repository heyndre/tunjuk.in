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
    return view('welcome');
});

Route::get('dash', function () {
  return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('list_hotel_admin', function () {
  return view('admin_hotel_list');
});

Route::get('tambah_hotel_admin', function () {
  return view('admin_hotel_tambah');
});

Route::resource('hotel_admin', 'HotelController');
