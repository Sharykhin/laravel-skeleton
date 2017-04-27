<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

/**
 * Class JWTConsumerAuth
 * @package App\Http\Middleware
 */
class JWTConsumerAuth extends BaseMiddleware
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
            return response()->badRequest('token_not_provided');
        }

        try {
            $parsedToken = $this->auth->parseToken($token);
            if($parsedToken->getClaim('role') !== 'ROLE_CONSUMER') {
                throw new JWTException('token_invalid');
            }
            // Ingore default auth, get user by UUID
            $user = $this->auth->toUser($token);

        } catch (TokenExpiredException $e) {
            // Generate new token and attempt authentication
            $newToken = $this->auth->refresh($token);
            $user = $this->auth->toUser($newToken);

            //return $this->respond('jwt.expired', 'token_ttl_expired', $e->getStatusCode(), [$e]);

        } catch (JWTException $e) {
            return response()->badRequest('token_invalid');

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
