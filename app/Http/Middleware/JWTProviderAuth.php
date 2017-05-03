<?php

namespace App\Http\Middleware;

use App\Interfaces\Services\IRoleManager;
use App\Http\Middleware\JWTBaseMiddleware;

/**
 * Class JWTProviderAuth
 * @package App\Http\Middleware
 */
class JWTProviderAuth extends JWTBaseMiddleware
{
    const ROLE = IRoleManager::ROLE_PROVIDER;
}
