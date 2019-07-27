<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which 
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'middleware' => 'api', 'prefix' => '/v1' ], function ($router) {
    Route::post('register', 'ApiController\UserController@register');
    Route::post('login', 'ApiController\UserController@login'); 
    Route::get('films', 'ApiController\FilmsController@index');
    Route::post('update', 'ApiController\UserController@update')->middleware('auth:api');
});
   
