<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    ['as' => 'api.', 'middleware' => ['cors']],
    function () {
        // Json
        Route::resource('kategori', 'KategoriController');
        Route::get('blog/{artikel}', 'Api\FrontController@singleblog');
        Route::get('blog-tag/{tag}', 'Api\FrontController@blogtag');
        Route::get('blog-kategori/{kategori}', 'Api\FrontController@blogkategori');
        Route::get('tag', 'TagController@getjson')->name('json_tag');
        Route::get('front', 'Api\FrontController@index')->name('json_front');
        Route::resource('artikel', 'Api\ArtikelController');
        Route::resource('/produk', 'Api\ProdukController');
    }
);
