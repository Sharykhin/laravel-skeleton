<?php

namespace App\Http\Middleware;

use App\Interfaces\Services\IRoleManager;
use App\Http\Middleware\JWTBaseMiddleware;

/**
 * Class JWTConsumerAuth
 * @package App\Http\Middleware
 */
class JWTConsumerAuth extends JWTBaseMiddleware
{
    const ROLE = IRoleManager::ROLE_CONSUMER;
}
