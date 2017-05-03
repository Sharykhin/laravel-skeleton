<?php

namespace App\Http\Controllers\Api\Consumer;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api\Consumer
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
        if (!$token = Auth::guard('api_consumer')->attempt($credentials)) {
            return response()->notAuthorized(trans('auth.failed'));
        };
        $consumer = Auth::guard('api_consumer')->user();

        // all good so return the token
        return response()->success(compact('token', 'consumer'));
    }
}
