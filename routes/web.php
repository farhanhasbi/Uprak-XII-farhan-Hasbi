<?php

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 Route::group(['prefix' => 'kategori'], function() {
        Route::get('', 'KategoriController@index');
        Route::get('form/{action}/{id?}', 'KategoriController@form');
        Route::post('data', 'KategoriController@store');
        Route::put('{id}', 'KategoriController@update');
        Route::delete('{id}', 'KategoriController@destroy');
    });

 Route::group(['prefix' => 'barang'], function() {
        Route::get('', 'BarangController@index');
        Route::get('form/{action}/{id?}', 'BarangController@form');
        Route::post('data', 'BarangController@store');
        Route::put('{id}', 'BarangController@update');
        Route::delete('{id}', 'BarangController@destroy');
        Route::get('export_excel', 'BarangController@export');
    });

  Route::group(['prefix' => 'datatable'], function(){
        Route::get('kategori', 'DatatableController@kategori');
        Route::get('barang', 'DatatableController@barang');
    });
 

   



