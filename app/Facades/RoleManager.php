<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class RoleManager
 * @package App\Facades
 */
class RoleManager extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'role_manager'; // the IoC binding.
    }
}
