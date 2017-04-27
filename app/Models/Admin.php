<?php

namespace App\Models;

use App\Auth\Rolable;
use App\Contracts\RolableContract;
use App\Contracts\Services\RoleContract;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;

/**
 * Class Consumer
 * @package App\Models
 */
class Admin extends Authenticatable implements RolableContract
{
    use Notifiable, Rolable;

    const ROLE = RoleContract::ROLE_ADMIN;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'role' => RoleContract::ROLE_ADMIN
        ];
    }
}
