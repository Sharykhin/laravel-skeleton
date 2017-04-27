<?php

namespace App\Contracts;

/**
 * Interface RoleContract
 * @package App\Contracts
 */
interface RolableContract
{
    /**
     * @return string
     */
    public function getRole() : string;
}