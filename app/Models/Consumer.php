<?php

namespace App\Models;

use App\Services\Role;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;

/**
 * Class Consumer
 * @package App\Models
 */
class Consumer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password',
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
            'role' => Role::ROLE_CONSUMER
        ];
    }
}
