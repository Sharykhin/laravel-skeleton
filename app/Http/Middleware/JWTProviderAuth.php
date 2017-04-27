<?php

namespace App\Http\Middleware;

use App\Contracts\Services\RoleContract;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Closure;
use App\Http\Middleware\BaseMiddleware;

/**
 * Class JWTProviderAuth
 * @package App\Http\Middleware
 */
class JWTProviderAuth extends BaseMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        $newToken = null;

        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return response()->notAuthorized();
        }

        try {
            // Ingore default auth, get user by UUID
            $user = $this->auth->toUser($token);

            if (!$user) {
                return response()->notFound('Invalid UUID');
            }

            if (!$this->role->isGranted($user, RoleContract::ROLE_PROVIDER)) {
                throw new JWTException(trans('auth.token.invalid'));
            }

        } catch (TokenExpiredException $e) {
            // Generate new token and attempt authentication
            $newToken = $this->auth->refresh($token);
            $user = $this->auth->toUser($newToken);

        } catch (JWTException $e) {
            return response()->badRequest(trans('auth.token.invalid'));
        }

        if (!$user) {
            return response()->notFound('Invalid UUID');
        }

        app('events')->fire('jwt.valid', $user);

        //Transform response
        $response = $next($request);

        // If new token exist, send back to user via response header
        if($newToken != null){
            $response = $response->header('New-Jwt-Token', $newToken);
        }

        return $response;
    }
}
