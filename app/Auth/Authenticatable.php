<?php

namespace App\Auth;

use Illuminate\Foundation\Auth\User;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;

/**
 * Class Authenticatable
 * @package App\Auth
 */
class Authenticatable extends User implements AuthenticatableUserContract
{
    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}