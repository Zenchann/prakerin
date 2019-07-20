<?php


Route::get('/', function () {
    return view('index');
});



Route::get('/blog/{artikel}', 'FrontController@singleblog');
Route::get('/blog-kategori/{kategori}', 'FrontController@blogkategori');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    // Resource
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('/kategori', 'KategoriController');
    Route::resource('/tag', 'TagController');
    Route::resource('/produk', 'ProdukController');
    Route::resource('/artikel', 'ArtikelController');
});
