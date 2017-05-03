<?php

namespace App\Auth;

/**
 * Class RoleHelper
 * @package App\Auth
 */
trait RoleHelper
{
    public function getRole() : string
    {
        return $this->role;
    }
}