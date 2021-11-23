<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes([
    'reset'=>false,
]);

Route::get('/home','HomeController@index');
Route::get('/','HomeController@index');
Route::get('/about','AboutController@index');
Route::get('/news','NewsController@index');
Route::get('/other','OtherController@index');

// Books Section =================================================

Route::get('/buku','BukuController@index');
Route::get('/buku/create','BukuController@create')->name('buku.create');
Route::post('/buku','BukuController@store')->name('buku.store');
Route::post('/buku/delete/{id}','BukuController@destroy')->name('buku.destroy');
Route::get('/buku/edit/{id}','BukuController@edit')->name('buku.edit');
Route::post('/buku/{id}','BukuController@update')->name('buku.update');
Route::get('/buku/search','BukuController@search')->name('buku.search');

// List Buku Section =================================================

Route::get('/buku/list', 'BukuController@buku')->name('buku.list');
Route::get('/detail-buku/{title}', 'BukuController@galbuku')->name('buku.galeri');

// Like Buku Section =================================================

Route::get('/buku/list/{id}', 'BukuController@likefoto')->name('like.foto');

// Comment Buku Section =================================================

Route::post('/buku/galeri/{id}', 'PostController@komentar')->name('buku.komentar');

// User Section =================================================

Route::get('/user','UserController@index');

// Galery Section =================================================

Route::get('/galeri', 'GaleriController@index');
Route::get('/galeri/create', 'GaleriController@create')->name('galeri.create');
Route::post('/galeri', 'GaleriController@store')->name('galeri.store');
Route::get('/galeri/edit/{id}', 'GaleriController@edit')->name('galeri.edit');
Route::post('/galeri/update/{id}', 'GaleriController@update')->name('galeri.update');
Route::post('/galeri/delete/{id}', 'GaleriController@destroy')->name('galeri.destroy');