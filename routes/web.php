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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','IndexController@index');
Route::get('/register','IndexController@register')->name('register');
Route::post('/register','IndexController@register')->name('register');
Route::get('/login','IndexController@login')->name('login');
Route::post('/login','IndexController@login')->name('login');
Route::get('/dashboard','IndexController@dashboard')->middleware('auth');
Route::get('/logout','IndexController@logout')->middleware('auth');

Route::get('/profile/{user}/edit','ProfileController@edit');
Route::get('/profile/{user}','ProfileController@show');
Route::PATCH('/profile/{user}','ProfileController@update')->name('profile.update');

Route::get('/companies','CompanyController@index')->name('companies.index');
Route::get('/companies/create','CompanyController@create')->name('companies.create')->middleware('auth');
Route::post('/companies','CompanyController@store')->name('companies.store')->middleware('auth');
Route::get('/companies/{company}','CompanyController@show')->name('companies.show')->middleware('auth');
Route::get('/companies/{company}/edit','CompanyController@edit')->name('companies.edit')->middleware('auth');
Route::PATCH('/companies/{company}','CompanyController@update')->name('companies.update')->middleware('auth');
Route::get('/companies/{company}/delete','CompanyController@destroy')->name('companies.destroy')->middleware('auth');
Route::resource('categories', 'CategoryController');
Route::get('/search','IndexController@search')->name('search');