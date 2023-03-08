<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::post('/user/refresh', 'UserController@ajax_refresh')->name('user.ajax_refresh');
    Route::post('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/detail/{id?}', 'UserController@detail')->name('user.detail');
    Route::post('/user/update/{id?}', 'UserController@update')->name('user.update');
    Route::post('/user/store/{id?}', 'UserController@store')->name('user.store');
    Route::post('/user/delete/{id?}', 'UserController@delete')->name('user.delete');

    Route::get('/product', 'ProductController@index')->name('product.index');

    Route::get('/swap', 'SoalController@swap')->name('soal.swap');
    Route::get('/terbilang', 'SoalController@terbilang')->name('soal.terbilang');
    Route::post('/terbilang', 'SoalController@terbilang_ajax')->name('soal.terbilang_ajax');
});

