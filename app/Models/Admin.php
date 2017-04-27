<?php

namespace App\Models;

use App\Services\Role;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;

/**
 * Class Consumer
 * @package App\Models
 */
class Admin extends Authenticatable
{
    use Notifiable;

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
            'role' => Role::ROLE_ADMIN
        ];
    }
}
