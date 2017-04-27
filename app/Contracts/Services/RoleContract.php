<?php

namespace App\Contracts\Services;

use App\Contracts\RolableContract;

/**
 * Interface Role
 * @package App\Contracts\Services
 */
interface RoleContract
{
    const ROLE_CONSUMER = 'ROLE_CONSUMER';
    const ROLE_PROVIDER = 'ROLE_PROVIDER';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';

    /**
     * @param RolableContract $user
     * @param string $role
     * @return bool
     */
    public function isGranted(RolableContract $user, string $role) : bool;
}