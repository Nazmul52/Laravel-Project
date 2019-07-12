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

Route::get('/', 'HomeController@index');


//Backend Route

Route::get('/logout','SuperAdminController@logout');
Route::get('/login', 'AdminController@index');
 Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//Category related route

Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/unactive_category/{id}', 'CategoryController@unactive_category');
Route::get('/active_category/{id}', 'CategoryController@active_category');
Route::get('/edit_category/{id}', 'CategoryController@edit_category');
Route::post('/update_category/{id}', 'CategoryController@update_category');
Route::get('/delete_category/{id}', 'CategoryController@delete_category');


//Manufacture related route

Route::get('/add_manufacture', 'ManufactureController@index');
Route::get('/all_manufacture', 'ManufactureController@all_manufacture');

Route::post('/save_manufacture', 'ManufactureController@save_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}', 'ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}', 'ManufactureController@active_manufacture');
Route::get('/edit_manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture');
Route::post('/update_manufacture/{manufacture_id}', 'ManufactureController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture');

//Product related route

Route::get('/add_product', 'ProductController@index');
Route::get('/all_product', 'ProductController@all_product');

Route::post('/save_product', 'ProductController@save_product');
Route::get('/unactive_product/{product_id}', 'ProductController@unactive_product');
Route::get('/active_product/{product_id}', 'ProductController@active_product');
Route::get('/edit_product/{product_id}', 'ProductController@edit_product');
Route::post('/update_product/{product_id}', 'ProductController@update_product');
Route::get('/delete_pruduct/{product_id}', 'ProductController@delete_pruduct');


//Slider route related

Route::get('/add_slider', 'SliderController@index');
Route::get('/all_slider', 'SliderController@all_slider');
Route::post('/save_slider', 'SliderController@save_slider');
Route::get('/unactive_slider/{slider_id}', 'SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}', 'SliderController@active_slider');
Route::get('/edit_slider/{slider_id}', 'SliderController@edit_slider');
Route::post('/update_slider/{slider_id}', 'SliderController@update_slider');
Route::get('/delete_slider/{slider_id}', 'SliderController@delete_slider');



//Product by Category route

Route::get('/product_by_category/{id}', 'HomeController@product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}', 'HomeController@product_by_manufacture');
Route::get('/view_product_details/{product_id}', 'HomeController@view_product_details');

//Cart Route

Route::post('/add_cart', 'CartController@index');
Route::get('/show_cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update_cart', 'CartController@update_cart');

///Checkout Route
Route::get('/login-check', 'CheckooutController@login_check');
Route::get('/checkout', 'CheckooutController@checkout');
Route::post('/customer_signup', 'CheckooutController@customer_registration');
Route::post('/customer_login', 'CheckooutController@customer_login');
Route::get('/customer_logout', 'CheckooutController@c_logout');
Route::post('/save_shipping_details', 'CheckooutController@shipping_details');

//Payment Route

Route::get('/payment', 'CheckooutController@payment');
Route::post('/order_place', 'CheckooutController@order_place');

//Admin manage order
Route::get('/manage_order', 'CheckooutController@manage_order');
Route::get('/view_order/{order_id}', 'CheckooutController@view_order');
Route::get('/success_order/{order_id}', 'CheckooutController@success_order');
Route::get('/pending_order/{order_id}', 'CheckooutController@pending_order');
Route::get('/delete_order/{order_id}', 'CheckooutController@delete_order');

//Customer Controller Route

Route::get('/profile_details/{customer_id}', 'CustomerController@profile_details');
Route::get('/order_details', 'CustomerController@order_details');
