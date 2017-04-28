<?php

namespace App\Services;

use App\Interfaces\Auth\IRole;
use App\Interfaces\Services\IRoleManager;
use InvalidArgumentException;

/**
 * Class Role
 * @package App\Services
 */
class RoleManager implements IRoleManager
{
    /**
     * @param IRole $user
     * @param string $role
     * @return bool
     * @throws \Exception
     */
    public function isGranted(IRole $user, string $role) : bool
    {
        $userRole = $user->getRole();
        if (!$this->isSupport($role)) {
            throw new InvalidArgumentException("Unsupported role exception {$role}");
        }

        switch ($userRole) {
            case self::ROLE_SUPERADMIN:
                return true;
            case self::ROLE_ADMIN:
                if ($role === self::ROLE_SUPERADMIN) {
                    return false;
                } else {
                    return true;
                }
            case self::ROLE_CONSUMER:
                if ($role === self::ROLE_CONSUMER) {
                    return true;
                } else {
                    return false;
                }
            case self::ROLE_PROVIDER:
                if ($role === self::ROLE_PROVIDER) {
                    return true;
                } else {
                    return false;
                }
        }

        return false;
    }

    /**
     * @param string $role
     * @return bool
     */
    private function isSupport(string $role) : bool
    {
        return in_array($role, [self::ROLE_CONSUMER, self::ROLE_PROVIDER, self::ROLE_ADMIN, self::ROLE_SUPERADMIN]);
    }
}
