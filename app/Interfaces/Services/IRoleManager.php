<?php

namespace App\Interfaces\Services;

use App\Interfaces\Auth\IRole;

/**
 * Interface IRoleManager
 * @package App\Interfaces\Services
 */
interface IRoleManager
{
    const ROLE_CONSUMER = 'ROLE_CONSUMER';
    const ROLE_PROVIDER = 'ROLE_PROVIDER';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';

    /**
     * @param IRole $user
     * @param string $role
     * @return bool
     */
    public function isGranted(IRole $user, string $role) : bool;
}