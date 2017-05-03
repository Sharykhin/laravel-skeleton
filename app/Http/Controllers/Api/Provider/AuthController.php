<?php

namespace App\Http\Controllers\Api\Provider;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api\Provider
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
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::guard('api_provider')->attempt($credentials)) {
            return response()->notAuthorized(trans('auth.failed'));
        };

        // all good so return the token
        return response()->success(compact('token'));
    }
}
