<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




// Json
Route::get('kategori', 'KategoriController@getjson')->name('json_kategori');
Route::get('artikel', 'ArtikelController@getjson')->name('json_artikel');
Route::get('tag', 'TagController@getjson')->name('json_tag');
Route::resource('siswa', 'Api\SiswaController');
