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


Route::get('/series', 'SeriesController@index')->name('index');
Route::get('/series/create', 'SeriesController@create')->name('create');
Route::post('/series/create', 'SeriesController@store')->name('store');
Route::post('/series/delete/{id}', 'SeriesController@destroy')->name('destroy');
