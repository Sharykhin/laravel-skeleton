<?php

namespace App\Models;

use App\Auth\RoleHelper;
use App\Interfaces\Auth\IRole;
use App\Interfaces\Services\IRoleManager;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;

/**
 * Class Provider
 * @package App\Models
 */
class Provider extends Authenticatable implements IRole
{
    use Notifiable, RoleHelper;

    const ROLE = IRoleManager::ROLE_PROVIDER;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'activate_token',
    ];

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'role' => IRoleManager::ROLE_PROVIDER
        ];
    }
}
