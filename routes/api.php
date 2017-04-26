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

Route::post('/user', function (Request $request) {
    $credentials = $request->only('email', 'password');
    $token = \Auth::guard('api_consumer')->attempt($credentials);

    // all good so return the token
    return response()->json(compact('token'));
});
