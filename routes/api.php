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
    ['as' => 'api.', 'middleware' => ['cors']],
    function () {
        // Json
        Route::resource('kategori', 'KategoriController');
        Route::get('tag', 'TagController@getjson')->name('json_tag');
        Route::get('front', 'Api\FrontController@index')->name('json_front');
        Route::get('blog/{artikel}', 'Api\FrontController@singleblog')->name('json_singleblog');
        Route::resource('artikel', 'ArtikelController');
    }
);
