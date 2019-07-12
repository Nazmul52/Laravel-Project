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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

//company
Route::resource('companies', 	'CompaniesController');
Route::resource('companies', 	'CompaniesController');

///project
Route::get('projects/create{company_id?}', 	'ProjectsController@create');
Route::resource('projects', 	'ProjectsController');

//task
Route::resource('tasks', 		'TasksController');
//role
Route::resource('roles', 		'RolesController');
//user
Route::resource('users', 		'UsersController');
//comment
Route::resource('comments', 	'CommentsController');
});

