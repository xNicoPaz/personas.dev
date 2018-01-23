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
Route::get('/paises/{country}/destruir', 'CountryController@destroy');
Route::post('/paises', 'CountryController@store');
Route::get('/paises/{country}', 'CountryController@show');

Route::get('/provincias/crear', 'ProvinceController@create');
Route::get('/provincias', 'ProvinceController@index');
Route::get('/provincias/{province}/destruir', 'ProvinceController@destroy');
Route::post('/provincias', 'ProvinceController@store');
Route::get('/provincias/{province}', 'ProvinceController@show');

Route::get('/localidades/crear', 'TownController@create');
Route::get('/localidades', 'TownController@index');
Route::get('/localidades/{town}/destruir', 'TownController@destroy');
Route::get('/localidades/{town}', 'TownController@show');
Route::post('/localidades', 'TownController@store');

Route::get('/personas/crear', 'PersonController@create');
Route::get('/personas', 'PersonController@index');
Route::get('/personas/{person}/destruir', 'PersonController@destroy');
Route::get('/personas/{person}', 'PersonController@show');
Route::post('/personas', 'PersonController@store');

/*Auth*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
