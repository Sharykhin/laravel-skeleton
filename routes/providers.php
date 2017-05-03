<?php

Route::group(['prefix' => 'providers', 'namespace'=> 'Provider'], function () {

    Route::post('/login')->uses('AuthController@login');

    Route::get('/{id}')->middleware('auth.api')->uses('ProviderController@get')->where('id', '\d+');
    Route::put('/{id}')->middleware('auth.api.provider')->uses('ProviderController@update')->where('id', '\d+');
    Route::delete('/{id}')->middleware('auth.api.provider')->uses('ProviderController@delete')->where('id', '\d+');
});

