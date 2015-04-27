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
Route::get('dataTP/tambah-tps', ['as' => 'dataTP.create_tps', 'uses' => 'TpembuanganController@create_tps']);
Route::get('dataTP/tambah-tpa', ['as' => 'dataTP.create_tpa', 'uses' => 'TpembuanganController@create_tpa']);
Route::post('dataTP/store-tps', ['as' => 'dataTP.store_tps', 'uses' => 'TpembuanganController@store_tps']);
Route::post('dataTP/store-tpa', ['as' => 'dataTP.store_tpa', 'uses' => 'TpembuanganController@store_tpa']);
Route::post('dataTP/update', 'TpembuanganController@update');
Route::delete('dataTP/tps/{modeltps}', ['as' => 'dataTP.destroy_tps', 'uses' => 'TpembuanganController@destroy_tps']);
Route::delete('dataTP/tpa/{modeltpa}', ['as' => 'dataTP.destroy_tpa', 'uses' => 'TpembuanganController@destroy_tpa']);
//Route::get('volumeTPS', 'TpembuanganController@show_tps');

//CRUD data petugas
Route::get('dataPetugas', 'PetugasController@index');
Route::get('dataPetugas/tambah', 'PetugasController@create');
Route::post('dataPetugas/store', 'PetugasController@store');
Route::patch('dataPetugas/{petugas}', 'PetugasController@update');
Route::delete('dataPetugas/{petugas}', 'PetugasController@destroy');

//tambah entri sampah
Route::get('entry', 'EntriController@create');
Route::post('entry/store', 'EntriController@store');

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
