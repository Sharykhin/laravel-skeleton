<?php

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
Route::group(['prefix' => 'providers', 'namespace'=> 'Provider'], function () {

    Route::post('/login')->uses('AuthController@login');

    Route::get('/{id}')->middleware('auth.api.provider')->uses('ProviderController@get')->where('id', '\d+');
});

Route::group(['prefix' => 'consumers', 'namespace'=> 'Consumer'], function () {
    Route::post('/login')->uses('AuthController@login');
});

Route::group(['prefix' => 'admins', 'namespace'=> 'Admin'], function () {
    Route::post('/login')->uses('AuthController@login');
});