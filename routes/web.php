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
Route::get('Detail_Hotel/{id}', 'HotelCatalog@show')->name('Hotel.show');

Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');

Route::resource('kuliner_admin', 'KulinerController');

Route::get('Daftar_Kuliner', 'KulinerCatalog@index');
Route::get('Detail_Kuliner/{id}', 'KulinerCatalog@show')->name('Kuliner.show');

Route::resource('wisata_admin', 'WisataController');

Route::get('Daftar_Wisata', 'WisataCatalog@index');
Route::get('Detail_Wisata/{id}', 'WisataCatalog@show')->name('Wisata.show');

Route::resource('kategori_admin', 'CategoryController');

Route::post('CommentHotel/{hotel_id}', ['uses' => 'CommentHotels@store', 'as' => 'CommentHotel.store']);

Route::resource('ulasan_hotel', 'UlasanHotel');
Route::resource('ulasan_wisata', 'UlasanWisata');
Route::resource('ulasan_kuliner', 'UlasanKuliner');

Route::get('/migrate', function() {
    $exitCode = Artisan::call('migrate --seed');
    return 'DONE'; //Return anything
});

Route::get('/migrate-reset', function() {
    $exitCode = Artisan::call('migrate-reset --seed');
    return 'DONE'; //Return anything
});
