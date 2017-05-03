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
require 'consumers.php';
require 'providers.php';

Route::group(['prefix' => 'admins', 'namespace'=> 'Admin'], function () {

    Route::post('/login')->uses('AuthController@login');

});