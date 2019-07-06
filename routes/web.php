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
Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'cors']], function () {

    // Json
    Route::get('kategori/json', 'KategoriController@getjson')->name('json_kategori');
    Route::get('artikel/json', 'ArtikelController@getjson')->name('json_artikel');
    Route::get('tag/json', 'TagController@getjson')->name('json_tag');

    // Resource+
    Route::resource('/kategori', 'KategoriController');
    Route::resource('/tag', 'TagController');
    Route::resource('/artikel', 'ArtikelController');
});
