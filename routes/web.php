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



Auth::routes();
Route::get('/', 'ProjectController@index');
Route::get('/home', 'ProjectController@index')->name('home');


/*
|--------------------------------------------------------------------------
| Project routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/projects', 'ProjectController@index');
Route::post('/projects/{id}', 'ProjectController@destroy');

Route::get('/project/create', 'ProjectController@create');
Route::post('/project/store', 'ProjectController@store');
Route::get('/projects/show/{id}', 'ProjectController@show');

Route::get('/projects/edit/{id}', 'ProjectController@edit');
Route::post('/projects/update/{id}', 'ProjectController@update');


/*
|--------------------------------------------------------------------------
| Product routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/products', 'ProductController@index');
Route::post('/products/{id}', 'ProductController@destroy');

Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::get('/products/show/{id}', 'ProductController@show');

Route::get('/products/edit/{id}', 'ProductController@edit');
Route::post('/products/update/{id}', 'ProductController@update');
