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
//route home
Auth::routes();
Route::get('/', function () {
  return view('home');
})->name('home');
Route::get('/home', function () {
  return view('home');
})->name('home');

//hotel route
Route::get('/hotel', 'hotelController@show')->name('hotel');
Route::get('/my/hotel', 'hotelController@myHotelShow')->name('my.hotel');
Route::get('/details/{id}/hotel', 'hotelController@details')->name('hotel.details');
Route::post('/hotel/search', 'hotelController@search')->name('hotel.search');
Route::get('/hotel/create', 'hotelController@create')->name('hotel.create')->middleware('auth');
Route::put('/hotel/insert', 'hotelController@insert')->name('hotel.insert')->middleware('auth');
Route::get('/hotel/{id}/edit', 'hotelController@edit')->name('hotel.edit')->middleware('auth');
Route::post('/hotel/{id}/update', 'hotelController@update')->name('hotel.update')->middleware('auth');
Route::get('/hotel/{id}/delete', 'hotelController@delete')->name('hotel.delete')->middleware('auth');
Route::put('/hotel/{id}/comment', 'hotelController@comment')->name('hotel.comment')->middleware('auth');

//booking route
Route::put('/hotel/{id}/booking', 'reservationController@booking')->name('hotel.booking')->middleware('auth');
Route::get('/reservation', 'reservationController@show')->name('reservation')->middleware('auth');

//room route
Route::get('/room', 'chambreController@show')->name('room');
Route::get('/room/{id}/details', 'chambreController@details')->name('room.details');
Route::get('/room/create', 'hotelController@create')->name('room.create')->middleware('auth');
Route::put('/room/insert', 'hotelController@insert')->name('room.insert')->middleware('auth');
Route::get('/room/{id}/edit', 'hotelController@edit')->name('room.edit')->middleware('auth');
Route::post('/room/{id}/update', 'hotelController@update')->name('room.update')->middleware('auth');
Route::get('/room/{id}/delete', 'hotelController@delete')->name('room.delete')->middleware('auth');

//unfound route
Route::get('/{page}', function ($page) {
  $pages = [
    'hotel' => 'hotel'
  ];
  if (!array_key_exists($page, $pages))
    abort(404, 'Sorry this page not exist');
  else return view($pages[$page]);
});
