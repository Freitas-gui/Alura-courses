<?php

use Illuminate\Support\Facades\Auth;

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
Route::get('/series/create', 'SeriesController@create')->name('create')->middleware('auth.custom');
Route::post('/series/create', 'SeriesController@store')->name('store')->middleware('auth.custom');
Route::post('/series/delete/{id}', 'SeriesController@destroy')->name('destroy')->middleware('auth.custom');
Route::get('/series/{serieId}/seasons', 'SeasonsController@index')->name('seasonIndex');

Route::post('/series/{id}/editName', 'SeriesController@editName')->name('editName')->middleware('auth.custom');

Route::get('/seasons/{season}/episodes', 'EpisodesController@index')->name('episodeIndex');
Route::post('seasons/{season}/episodes/watch', 'EpisodesController@watch')->name('episodeWatch')->middleware('auth.custom');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/myLogin', 'myLoginController@index')->name('myLoginIndex');
Route::post('/myLogin', 'myLoginController@login')->name('myLogin');

Route::get('/myRegister', 'myRegisterController@create')->name('myRegisterCreate');
Route::post('/myRegister', 'myRegisterController@story')->name('myRegisterStory');

Route::get('/myLogout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect(route('myLoginIndex'));
})->name('myLogout');


