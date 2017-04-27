<?php

namespace App\Auth;

/**
 * Class Rolable
 * @package App\Auth
 */
trait Rolable
{
    public function getRole() : string
    {
        return self::ROLE;
    }
}