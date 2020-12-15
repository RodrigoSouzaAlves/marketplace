<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('admin')->name('admin_')->namespace('Admin')->group(function(){
    Route::prefix('stores')->name('stores_')->group(function (){

        Route::get('/', 'StoreController@index')->name('index');
        Route::get('/create', 'StoreController@create')->name('create');
        Route::post('/store', 'StoreController@store')->name('store');
        Route::get('{id}/edit', 'StoreController@edit')->name('edit');
        Route::post('/update/{id}', 'StoreController@update')->name('update');
        Route::get('/destroy/{id}', 'StoreController@destroy')->name('destroy');
    });

});
