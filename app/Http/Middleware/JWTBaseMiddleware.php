<?php

namespace App\Http\Middleware;

use App\Interfaces\Services\IRoleManager;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Closure;
use App\Http\Middleware\BaseMiddleware;

/**
 * Class JWTBaseMiddleware
 * @package App\Http\Middleware
 */
class JWTBaseMiddleware extends BaseMiddleware
{
    const ROLE = null;
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

            if (!is_null(static::ROLE) && !$this->role->isGranted($user, static::ROLE)) {
                throw new JWTException(trans('auth.token.invalid'));
            }

        } catch (TokenExpiredException $e) {
            // Generate new token and attempt authentication
            $newToken = $this->auth->refresh($token);
            $user = $this->auth->toUser($newToken);

            //return $this->respond('jwt.expired', 'token_ttl_expired', $e->getStatusCode(), [$e]);

        } catch (JWTException $e) {
            return response()->badRequest(trans('auth.token.invalid'));

        }

        //If no such user
        if (! $user) {
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
