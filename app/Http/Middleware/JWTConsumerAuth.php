<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTConsumerAuth extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        $newToken = null;

        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return response()->json(['success' => false, 'message' => 'token_not_provided'], 400);
        }

        try {
            $parsedToken = $this->auth->parseToken($token);
            if($parsedToken->getClaim('role') !== 'ROLE_CONSUMER') {
                throw new JWTException();
            }
            // Ingore default auth, get user by UUID
            $user = $this->auth->toUser($token);

        } catch (TokenExpiredException $e) {
            // Generate new token and attempt authentication
            $newToken = $this->auth->refresh($token);
            $user = $this->auth->toUser($newToken);

            //return $this->respond('jwt.expired', 'token_ttl_expired', $e->getStatusCode(), [$e]);

        } catch (JWTException $e) {
            return response()->json(['success' => false, 'message' => 'token_invalid'], 400);

        }

        //If no such user
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Invalid UUID'], 404);
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