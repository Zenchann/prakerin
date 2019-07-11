<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    ['middleware' => ['cors']],
    function () {
        // Json
        // Route::resource('kategori', 'KategoriController');
        // Route::get('tag', 'TagController@getjson')->name('json_tag');
        // Route::get('front', 'Api\FrontController@index')->name('json_front');
        // Route::get('blog/{artikel}', 'Api\FrontController@singleblog')->name('json_singleblog');
        // Route::resource('artikel', 'ArtikelController');
        Route::resource('/produk', 'Api\ProdukController');
    }
);
