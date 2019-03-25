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
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'ProductController@index');
Route::get('/products', 'ProductController@index');
Route::post('/products/{id}', 'ProductController@destroy');

Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::get('/products/show/{id}', 'ProductController@show');

Route::get('/products/edit/{id}', 'ProductController@edit');
Route::post('/products/update/{id}', 'ProductController@update');
