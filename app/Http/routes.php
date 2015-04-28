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

//CRUD TPA dan TPS
Route::get('dataTP', ['as' => 'dataTP.index', 'uses' => 'TpembuanganController@index']);
Route::get('dataTP/tps/tambah', ['as' => 'dataTP.create_tps', 'uses' => 'TpembuanganController@create_tps']);
Route::get('dataTP/tpa/tambah', ['as' => 'dataTP.create_tpa', 'uses' => 'TpembuanganController@create_tpa']);
Route::post('dataTP/tps', ['as' => 'dataTP.store_tps', 'uses' => 'TpembuanganController@store_tps']);
Route::post('dataTP/tpa', ['as' => 'dataTP.store_tpa', 'uses' => 'TpembuanganController@store_tpa']);
Route::post('dataTP/update', ['as' => 'dataTP.update', 'uses' => 'TpembuanganController@update']);
Route::delete('dataTP/tps/{modeltps}', ['as' => 'dataTP.destroy_tps', 'uses' => 'TpembuanganController@destroy_tps']);
Route::delete('dataTP/tpa/{modeltpa}', ['as' => 'dataTP.destroy_tpa', 'uses' => 'TpembuanganController@destroy_tpa']);

//CRUD data petugas
Route::get('dataPetugas', ['as' => 'dataPetugas.index', 'uses' => 'PetugasController@index']);
Route::get('dataPetugas/tambah', ['as' => 'dataPetugas.create', 'uses' => 'PetugasController@create']);
Route::post('dataPetugas', ['as' => 'dataPetugas.store', 'uses' => 'PetugasController@store']);
Route::put('dataPetugas/{petugas}', ['as' => 'dataPetugas.update', 'uses' => 'PetugasController@update']);
Route::delete('dataPetugas/{petugas}', ['as' => 'dataPetugas.destroy', 'uses' => 'PetugasController@destroy']);

//tambah entri sampah
Route::get('entry', ['as' => 'entry.create_tps', 'uses' => 'EntriController@create_tps']);
Route::post('entry', ['as' => 'entry.store_tps', 'uses' => 'EntriController@store_tps']);
Route::get('volumeTPS', 'TpembuanganController@show_tps');

// CRUD sarana pengangkut sampah
Route::get('dataSarana', ['as' => 'dataSarana.index', 'uses' => 'TipeSaranaController@index']);
Route::post('dataSarana', ['as' => 'dataSarana.store', 'uses' => 'TipeSaranaController@store']);
Route::get('dataSarana/tambah', ['as' => 'dataSarana.create', 'uses' => 'TipeSaranaController@create']);
Route::get('dataSarana/{tipesarana}/ubah', ['as' => 'dataSarana.edit', 'uses' => 'TipeSaranaController@edit']);
Route::get('dataSarana/{tipesarana}', ['as' => 'dataSarana.show', 'uses' => 'TipeSaranaController@show']);
Route::put('dataSarana/{tipesarana}', ['as' => 'dataSarana.update', 'uses' => 'TipeSaranaController@update']);
Route::delete('dataSarana/{tipesarana}', ['as' => 'dataSarana.destroy', 'uses' => 'TipeSaranaController@destroy']);

//unimplemented
Route::get('dataAdmin', 'Auth\AuthController@index');
Route::get('volumeTPA', 'TpembuanganController@show_tpa');
Route::get('index', 'Auth\AuthController@kael');
Route::get('/', 'Auth\AuthController@kael');

Route::resource('test', 'DummyController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
