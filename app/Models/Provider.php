<?php

namespace App\Models;

use App\Services\Role;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;

/**
 * Class Provider
 * @package App\Models
 */
class Provider extends Authenticatable
{
    use Notifiable;

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
            'role' => Role::ROLE_PROVIDER
        ];
    }
}
