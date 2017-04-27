<?php

namespace App\Models;

use App\Auth\Rolable;
use App\Contracts\RolableContract;
use App\Contracts\Services\RoleContract;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;

/**
 * Class Provider
 * @package App\Models
 */
class Provider extends Authenticatable implements RolableContract
{
    use Notifiable, Rolable;

    const ROLE = RoleContract::ROLE_PROVIDER;

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
            'role' => RoleContract::ROLE_PROVIDER
        ];
    }
}
