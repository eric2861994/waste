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

Route::model('petugas', 'App\Petugas');

Route::resource('tpakhir', 'TpakhirsController@index');

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('dataTP', 'TpembuanganController@index');
Route::get('dataTP/tambah-tps', 'TpembuanganController@create_tps');
Route::get('dataTP/tambah-tpa', 'TpembuanganController@create_tpa');
Route::post('dataTP/store', 'TpembuanganController@store');

Route::get('dataPetugas', 'PetugasController@index');
Route::get('dataPetugas/tambah', 'PetugasController@create');
Route::post('dataPetugas/store', 'PetugasController@store');
Route::patch('dataPetugas/{petugas}', 'PetugasController@update');
Route::get('dataAdmin', 'AdminController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
