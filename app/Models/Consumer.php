<?php

namespace App\Models;

use App\Interfaces\Services\IRoleManager;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Consumer
 * @package App\Models
 */
class Consumer extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $role = IRoleManager::ROLE_CONSUMER;

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
            'role' => $this->role
        ];
    }
}
