<?php

namespace App\Models;

use App\Interfaces\Services\IRoleManager;
use Illuminate\Notifications\Notifiable;
use App\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provider
 * @package App\Models
 */
class Provider extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $role = IRoleManager::ROLE_PROVIDER;

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
            'role' => $this->role
        ];
    }
}
