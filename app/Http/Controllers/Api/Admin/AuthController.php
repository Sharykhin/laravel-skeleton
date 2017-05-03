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

        if (!$token = Auth::guard('api_admin')->attempt($credentials)) {
            return response()->notAuthorized(trans('auth.failed'));
        };

        $admin = Auth::guard('api_admin')->user();

        // all good so return the token
        return response()->success(compact('toke', 'admin'));
    }
}
