<?php

use Illuminate\Support\Facades\Route;

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
//     return view('index');
// });

Route::get('/login', 'AuthsController@login')->name('login');
Route::post('/postlogin', 'AuthsController@postlogin');
Route::get('/logout', 'AuthsController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
    Route::resource('faks', 'FaksController');
    Route::get('/pros/{id}/delete', 'ProsController@delete');
    Route::resource('pros', 'ProsController');
    Route::get('/kris/{id}/delete', 'KrisController@delete');
    Route::get('/kris/create', 'KrisController@create');
    Route::get('/kris/{per}', 'KrisController@in');
    Route::resource('kris', 'KrisController');
    Route::resource('opes', 'OpesController');
    Route::resource('pers', 'PersController');
    Route::get('/kets', 'KetsController@index');
    Route::get('/kets/{per}', 'KetsController@in');
    Route::get('/kets/{k1}/{k2}', 'KetsController@swipe');
    Route::post('/kets/update', 'KetsController@update');
    Route::get('/users/{id}/show', 'UsersController@show');
    Route::get('/users/{id}/edit', 'UsersController@edit');
    Route::patch('/users/{id}', 'UsersController@update');
    Route::get('/users/{user}/rp', 'UsersController@rp');
    Route::get('/facs/{per}', 'FacsController@in');
    Route::get('/facs', 'FacsController@index');
    Route::post('/facs/update', 'FacsController@store');
    Route::get('/reports', 'ReportsController@index');
    Route::resource('reports', 'ReportsController');
});

Route::group(['middleware' => ['auth','checkRole:operator']], function(){
    Route::delete('/mahs/{id_mah}/shw', 'MahsController@destroy');
    Route::resource('mahs', 'MahsController');
    Route::get('/skor_kris/{id_mah}/edit', 'Skor_krisController@edit');
    Route::patch('/skor_kris/{id_mah}', 'Skor_krisController@update');
    Route::get('/users/{id}/show1', 'UsersController@show1');
    Route::get('/users/{id}/edit1', 'UsersController@edit1');
    Route::patch('/users/up/{id}', 'UsersController@update1');
    Route::get('/hasils', 'HasilsController@index');
    Route::resource('hasils', 'HasilsController');
});

Route::group(['middleware' => ['auth','checkRole:admin,operator']], function(){
    Route::get('/', 'DashboardsController@index');
    Route::get('/users/{id}/edit_pass', 'UsersController@edit_pass');
    Route::patch('/users/{id}/ubah_pass', 'UsersController@ubah_pass');
    Route::get('/mahs/{id_mah}/shw', 'MahsController@shw');
});
