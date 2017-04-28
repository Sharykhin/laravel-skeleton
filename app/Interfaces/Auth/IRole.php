<?php

namespace App\Interfaces\Auth;

/**
 * Interface IRole
 * @package App\Interfaces\Auth
 */
interface IRole
{
    /**
     * @return string
     */
    public function getRole() : string;
}