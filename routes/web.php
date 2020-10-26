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

// RESOURCE FOR CUSTOMER

Auth::routes();
// Route::resource('Customer', 'CustomerController');

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::prefix('customer')->group(function () {

    Route::get('/', 'CustomerController@index');

    Route::get('/export', 'CustomerController@export');

    Route::get('/create', 'CustomerController@create');

    Route::get('/print-pdf', [ 'as' => 'customer.printpdf', 'uses' => 'CustomerController@printPDF']);

    Route::get('/{customer}', 'CustomerController@show');

    Route::get('/{customer}/edit', 'CustomerController@edit');

    Route::delete('/{customer}', 'CustomerController@destroy');

    Route::post('/', 'CustomerController@store');

    Route::patch('/{customer}', 'CustomerController@update');

});

Route::prefix('barang')->group(function(){
    Route::get('/', 'BarangController@index');

    Route::get('/create', 'BarangController@create');

    Route::post('/', 'BarangController@store');
});

// RESOURCE FOR USER


