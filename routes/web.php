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


Auth::routes();

Route::get('/', 'FilmsController@index')->name('allFilms');
Route::resource('films', 'FilmsController');

Route::post('/films/{film_id}/comment', 'FilmsController@comment')->middleware('auth');

//Route::auth(); 
Route::get('/home', 'HomeController@index');
