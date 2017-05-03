<?php


Route::group(['prefix' => 'consumers', 'namespace'=> 'Consumer'], function () {

    Route::post('/login')->uses('AuthController@login');

    Route::get('/{id}')->middleware('auth.api.consumer')->uses('ConsumerController@get')->where('id', '\d+');
});