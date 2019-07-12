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

Route::get('/', "HomeController@index")->name('welcome');

Auth::routes();
Route::post('reservation', 'ReservationController@reserve')->name('reservation.reserve');
Route::post('contact', 'ReservationController@contact')->name('contact');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::resource('slider', 'SliderController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::get('reservation', 'AdminReservationController@index')->name('reservation.index');

	Route::get('contact', 'AdminReservationController@contactIndex')->name('contact.index');

	Route::post('reservation/{id}', 'AdminReservationController@status')->name('reservation.status');
	Route::delete('reservation/{id}', 'AdminReservationController@destroy')->name('reservation.destroy');

	Route::delete('contact/{id}', 'AdminReservationController@contactDestroy')->name('contact.destroy');

});
