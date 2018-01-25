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

Route::get('/personas/crear', 'PersonController@create');
Route::get('/personas', 'PersonController@index');
Route::get('/personas/{person}/destruir', 'PersonController@destroy');
Route::get('/personas/{person}', 'PersonController@show');
Route::post('/personas', 'PersonController@store');
Route::get('/personas/{person}/editar', 'PersonController@edit');
Route::put('/personas/{person}', 'PersonController@update');

Route::get('/personas/localidades/{town}', 'PersonController@showPeopleByTown');
Route::get('/personas/provincias/{province}', 'PersonController@showPeopleByProvince');
Route::get('/personas/paises/{country}', 'PersonController@showPeopleByCountry');

Route::get('/localidades/crear', 'TownController@create');
Route::get('/localidades', 'TownController@index');
Route::get('/localidades/{town}/destruir', 'TownController@destroy');
Route::get('/localidades/{town}', 'TownController@show');
Route::post('/localidades', 'TownController@store');
Route::get('/localidades/{town}/editar', 'TownController@edit');
Route::put('/localidades/{town}', 'TownController@update');

Route::get('/provincias/crear', 'ProvinceController@create');
Route::get('/provincias', 'ProvinceController@index');
Route::get('/provincias/{province}/destruir', 'ProvinceController@destroy');
Route::get('/provincias/{province}', 'ProvinceController@show');
Route::post('/provincias', 'ProvinceController@store');
Route::get('/provincias/{province}/editar', 'ProvinceController@edit');
Route::put('/provincias/{province}', 'ProvinceController@update');

Route::get('/paises/crear', 'CountryController@create');
Route::get('/paises', 'CountryController@index');
Route::get('/paises/{country}/destruir', 'CountryController@destroy');
Route::get('/paises/{country}', 'CountryController@show');
Route::post('/paises', 'CountryController@store');
Route::get('/paises/{country}/editar', 'CountryController@edit');
Route::put('/paises/{country}', 'CountryController@update');

Route::post('/personas/q', 'PersonController@query');
Route::post('/localidades/q', 'TownController@query');
Route::post('/provincias/q', 'ProvinceController@query');
Route::post('/paises/q', 'CountryController@query');

/*Auth*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
