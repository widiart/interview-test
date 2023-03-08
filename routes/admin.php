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
    Route::get('/user/detail/{id}', 'UserController@index')->name('user.detail');
    Route::get('/user/update/{id}', 'UserController@index')->name('user.update');
    Route::get('/user/delete/{id}', 'UserController@index')->name('user.delete');
});

