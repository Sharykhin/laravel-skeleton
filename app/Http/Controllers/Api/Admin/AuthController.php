<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api\Admin
 */
class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request) : JsonResponse
    {
        $credentials = $request->only('username', 'password');
        $token = Auth::guard('api_admin')->attempt($credentials);

        // all good so return the token
        return response()->success(compact('token'));
    }
}
