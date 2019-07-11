<?php


Route::get('/', function () {
    return view('index');
});

// Route::get('siswa', function () {
//     return view('siswa');
// });


Route::get('/blog/{artikel}', 'FrontController@singleblog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Resource+
    // Route::get('/kategori', 'KategoriController@json');
    // Route::get('/artikel', 'ArtikelController@view');
    // Route::resource('/kategori', 'KategoriController');
    // Route::resource('/tag', 'TagController');
    Route::resource('/produk', 'ProdukController');
    // Route::resource('/artikel', 'ArtikelController');
});
