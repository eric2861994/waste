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

//CRUD TPA dan TPS
Route::get('dataTP', ['as' => 'dataTP.index', 'uses' => 'TpembuanganController@index']);
Route::get('dataTP/tps/tambah', ['as' => 'dataTP.create_tps', 'uses' => 'TpembuanganController@create_tps']);
Route::get('dataTP/tpa/tambah', ['as' => 'dataTP.create_tpa', 'uses' => 'TpembuanganController@create_tpa']);
Route::get('dataTP/tps/{modeltps}', ['as' => 'dataTP.show_tps', 'uses' => 'TpembuanganController@show_tps']);
Route::get('dataTP/tpa/{modeltpa}', ['as' => 'dataTP.show_tpa', 'uses' => 'TpembuanganController@show_tpa']);
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
Route::get('entry-tps', ['as' => 'entry.create_tps', 'uses' => 'EntriController@create_tps']);
Route::post('entry-tps', ['as' => 'entry.store_tps', 'uses' => 'EntriController@store_tps']);
Route::get('entry-tpa', ['as' => 'entry.create_tpa', 'uses' => 'EntriController@create_tpa']);
Route::post('entry-tpa', ['as' => 'entry.store_tpa', 'uses' => 'EntriController@store_tpa']);
Route::get('volumeTPS', 'TpembuanganController@tps_summary');

// CRUD sarana pengangkut sampah
Route::get('dataSarana', ['as' => 'dataSarana.index', 'uses' => 'TipeSaranaController@index']);
Route::post('dataSarana', ['as' => 'dataSarana.store', 'uses' => 'TipeSaranaController@store']);
Route::get('dataSarana/tambah', ['as' => 'dataSarana.create', 'uses' => 'TipeSaranaController@create']);
Route::get('dataSarana/{tipesarana}/ubah', ['as' => 'dataSarana.edit', 'uses' => 'TipeSaranaController@edit']);
Route::get('dataSarana/{tipesarana}', ['as' => 'dataSarana.show', 'uses' => 'TipeSaranaController@show']);
Route::put('dataSarana/{tipesarana}', ['as' => 'dataSarana.update', 'uses' => 'TipeSaranaController@update']);
Route::delete('dataSarana/{tipesarana}', ['as' => 'dataSarana.destroy', 'uses' => 'TipeSaranaController@destroy']);

//Sarana
Route::get('sarana', ['as' => 'sarana.index', 'uses' => 'SaranaController@index']);
Route::post('sarana', ['as' => 'sarana.store', 'uses' => 'SaranaController@store']);
Route::get('sarana/tambah', ['as' => 'sarana.create', 'uses' => 'SaranaController@create']);
Route::put('sarana/{sarana}', ['as' => 'sarana.update', 'uses' => 'SaranaController@update']);
Route::delete('sarana/{sarana}', ['as' => 'sarana.destroy', 'uses' => 'SaranaController@destroy']);
Route::get('sarana/{sarana}/ubah', ['as' => 'sarana.edit', 'uses' => 'SaranaController@edit']);

//CRUD JADWAL + DETILJADWAL
Route::get('jadwal', ['as' => 'jadwal.index', 'uses' => 'JadwalController@index']);
Route::get('jadwal/{modeljadwal}', ['as' => 'jadwal.show', 'uses' => 'JadwalController@show']);
Route::get('jadwal/sarana/jadwalkan', ['as' => 'jadwal.jadwalSarana', 'uses' => 'JadwalController@jadwalSarana']);
Route::get('jadwal/sarana/hitung', ['as' => 'jadwal.hitungSarana', 'uses' => 'JadwalController@hitungSarana']);

Route::get('/', 'HomeController@check');
Route::get('home', 'Auth\AuthController@reLogin');

// REVISI
Route::get('pengguna', ['as' => 'pengguna.index', 'uses' => 'PenggunaController@index']);

//unimplemented
Route::get('dataAdmin', 'Auth\AuthController@index');
Route::get('volumeTPA', 'TpembuanganController@tpa_summary');
Route::get('index', 'Auth\AuthController@kael');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//debugging purposes
Route::get('debug/detailJadwal', 'DebugController@detailJadwal');

//useless
Route::post('detailJadwal', ['as' => 'detailJadwal.store', 'uses' => 'DetailJadwalController@store']);
