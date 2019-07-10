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

Route::group(
    ['middleware' => 'cors', 'as' => 'api.'],
    function () {
        // Json
        Route::get('kategori', 'KategoriController@getjson')->name('json_kategori');
        Route::get('artikel', 'ArtikelController@getjson')->name('json_artikel');
        Route::get('tag', 'TagController@getjson')->name('json_tag');
        Route::get('front', 'Api\FrontController@index')->name('json_front');
        Route::get('blog/{artikel}', 'Api\FrontController@singleblog')->name('json_singleblog');
        Route::resource('siswa', 'Api\SiswaController');
    }
);
