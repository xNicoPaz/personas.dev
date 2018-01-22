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

Route::get('/paises/crear', 'CountryController@create');
Route::get('/paises', 'CountryController@index');
Route::delete('/paises/{country}', 'CountryController@destroy');

Route::get('/provincias/crear', 'ProvinceController@create');
Route::get('/provincias', 'ProvinceController@index');
Route::delete('/provincias/{province}', 'ProvinceController@destroy');

Route::get('/localidades/crear', 'TownController@create');
Route::get('/localidades', 'TownController@index');
Route::delete('/localidades/{town}', 'TownController@destroy');

Route::get('/personas/crear', 'PersonController@create');
Route::get('/personas', 'PersonController@index');
Route::delete('/personas/{person}', 'PersonController@destroy');

/*Auth*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
