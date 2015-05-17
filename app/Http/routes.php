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

// use case entri sampah
Route::get('entry/tps', ['as' => 'entry.create_tps', 'uses' => 'EntriController@create_tps']);
Route::get('entry/tpa', ['as' => 'entry.create_tpa', 'uses' => 'EntriController@create_tpa']);
Route::post('entry/tps', ['as' => 'entry.store_tps', 'uses' => 'EntriController@store_tps']);
Route::post('entry/tpa', ['as' => 'entry.store_tpa', 'uses' => 'EntriController@store_tpa']);

Route::controllers([
    'auth' => 'Auth\AuthController'
]);

// CRUD users
Route::get('pengguna', ['as' => 'user.index', 'uses' => 'UserController@index']);
Route::get('pengguna/tambah', ['as' => 'user.create', 'uses' => 'UserController@create']);
Route::get('pengguna/{modeluser}/ubah', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
Route::get('pengguna/{modeluser}/hapus', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
Route::post('pengguna', ['as' => 'user.store', 'uses' => 'UserController@store']);
Route::put('pengguna/{modeluser}', ['as' => 'user.update', 'uses' => 'UserController@update']);


//CRUD TPA dan TPS
Route::get('dataTP', ['as' => 'dataTP.index', 'uses' => 'TpembuanganController@index']);
Route::get('dataTP/tps/tambah', ['as' => 'dataTP.create_tps', 'uses' => 'TpembuanganController@create_tps']);
Route::get('dataTP/tpa/tambah', ['as' => 'dataTP.create_tpa', 'uses' => 'TpembuanganController@create_tpa']);
Route::post('dataTP/tps', ['as' => 'dataTP.store_tps', 'uses' => 'TpembuanganController@store_tps']);
Route::post('dataTP/tpa', ['as' => 'dataTP.store_tpa', 'uses' => 'TpembuanganController@store_tpa']);
Route::post('dataTP/update', ['as' => 'dataTP.update', 'uses' => 'TpembuanganController@update']);
Route::delete('dataTP/tps/{modeltps}', ['as' => 'dataTP.destroy_tps', 'uses' => 'TpembuanganController@destroy_tps']);
Route::delete('dataTP/tpa/{modeltpa}', ['as' => 'dataTP.destroy_tpa', 'uses' => 'TpembuanganController@destroy_tpa']);

// pantau volume sampah
Route::get('pengawasan/ringkas', ['as' => 'dataTP.summary', 'uses' => 'TpembuanganController@summary']);
Route::get('pengawasan/mingguan', ['as' => 'dataTP.detailed', 'uses' => 'TpembuanganController@detailed']);
Route::get('pengawasan/tps/{modeltps}', ['as' => 'dataTP.show_tps', 'uses' => 'TpembuanganController@show_tps']);
Route::get('pengawasan/tpa/{modeltpa}', ['as' => 'dataTP.show_tpa', 'uses' => 'TpembuanganController@show_tpa']);

// CRUD sarana pengangkut sampah
Route::get('tipe_sarana', ['as' => 'dataSarana.index', 'uses' => 'TipeSaranaController@index']);
Route::get('tipe_sarana/tambah', ['as' => 'dataSarana.create', 'uses' => 'TipeSaranaController@create']);
Route::get('tipe_sarana/{tipesarana}', ['as' => 'dataSarana.show', 'uses' => 'TipeSaranaController@show']);
Route::get('tipe_sarana/{tipesarana}/ubah', ['as' => 'dataSarana.edit', 'uses' => 'TipeSaranaController@edit']);
Route::get('tipe_sarana/{tipesarana}/hapus', ['as' => 'dataSarana.destroy', 'uses' => 'TipeSaranaController@destroy']);
Route::post('tipe_sarana', ['as' => 'dataSarana.store', 'uses' => 'TipeSaranaController@store']);
Route::put('tipe_sarana/{tipesarana}', ['as' => 'dataSarana.update', 'uses' => 'TipeSaranaController@update']);

// Sarana
Route::get('sarana', ['as' => 'sarana.index', 'uses' => 'SaranaController@index']);
Route::get('sarana/tambah', ['as' => 'sarana.create', 'uses' => 'SaranaController@create']);
Route::get('sarana/{sarana}/ubah', ['as' => 'sarana.edit', 'uses' => 'SaranaController@edit']);
Route::get('sarana/{sarana}', ['as' => 'sarana.destroy', 'uses' => 'SaranaController@destroy']);
Route::post('sarana', ['as' => 'sarana.store', 'uses' => 'SaranaController@store']);
Route::put('sarana/{sarana}', ['as' => 'sarana.update', 'uses' => 'SaranaController@update']);

//CRUD JADWAL + DETILJADWAL
Route::get('jadwal', ['as' => 'jadwal.index', 'uses' => 'JadwalController@index']);
Route::get('jadwal/{modeljadwal}', ['as' => 'jadwal.show', 'uses' => 'JadwalController@show']);
Route::get('jadwal/sarana/jadwalkan', ['as' => 'jadwal.jadwalSarana', 'uses' => 'JadwalController@jadwalSarana']);
Route::get('jadwal/sarana/hitung', ['as' => 'jadwal.hitungSarana', 'uses' => 'JadwalController@hitungSarana']);
Route::get('jadwal/petugas/hitung', ['as' => 'jadwal.hitungPetugas', 'uses' => 'JadwalController@hitungPetugas']);
Route::get('jadwal/petugas/jadwalkan', ['as' => 'jadwal.jadwalPetugas', 'uses' => 'JadwalController@jadwalPetugas']);


// Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@check');
Route::get('home', 'Auth\AuthController@reLogin');
Route::get('redirector', ['as' => 'user.redirect', 'uses' => 'UserController@redirect']);
Route::get('notice', ['as' => 'user.notice', 'uses' => 'UserController@notice']);
Route::get('jadwalkerja', ['as' => 'user.jadwal', 'uses' => 'UserController@jadwal']);