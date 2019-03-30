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
// Route::get('/home', 'ProjectController@index')->name('home');


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('project', 'ProjectController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


/*
|--------------------------------------------------------------------------
| Project routes
|--------------------------------------------------------------------------
|
|
*/

// Route::get('/projects', 'ProjectController@index');
// Route::post('/projects/{id}', 'ProjectController@destroy');

// Route::get('/project/create', 'ProjectController@create');
// Route::post('/project/store', 'ProjectController@store');
// Route::get('/projects/show/{id}', 'ProjectController@show');

// Route::get('/projects/edit/{id}', 'ProjectController@edit');
// Route::post('/projects/update/{id}', 'ProjectController@update');


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


/*
|--------------------------------------------------------------------------
| EavAttribute routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/eav_attributes', 'EavAttributeController@index');
Route::post('/eav_attributes/{id}', 'EavAttributeController@destroy');

Route::get('/eav_attribute/create', 'EavAttributeController@create');
Route::post('/eav_attribute/store', 'EavAttributeController@store');
Route::get('/eav_attributes/show/{id}', 'EavAttributeController@show');

Route::get('/eav_attributes/edit/{id}', 'EavAttributeController@edit');
Route::post('/eav_attributes/update/{id}', 'EavAttributeController@update');
