<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');

Route::get('dataTP', 'TpembuanganController@index');
Route::get('dataTP/tambah-tps', 'TpembuanganController@create_tps');
Route::get('dataTP/tambah-tpa', 'TpembuanganController@create_tpa');
Route::get('volumeTPS', 'TpembuanganController@show_tps');
Route::post('dataTP/store', 'TpembuanganController@store');
Route::post('dataTP/update', 'TpembuanganController@update');
Route::post('dataTP/destroy', 'TpembuanganController@destroy');

Route::get('dataPetugas', 'PetugasController@index');
Route::get('dataPetugas/tambah', 'PetugasController@create');
Route::post('dataPetugas/store', 'PetugasController@store');
Route::patch('dataPetugas/{petugas}', 'PetugasController@update');
Route::delete('dataPetugas/{petugas}', 'PetugasController@destroy');

Route::get('entry', 'EntriController@create');
Route::post('entry/store', 'EntriController@store');

//unimplemented
Route::get('dataAdmin', 'Auth\AuthController@index');
Route::get('volumeTPA', 'TpembuanganController@show_tpa');
Route::get('index', 'Auth\AuthController@kael');
Route::get('/', 'Auth\AuthController@kael');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
