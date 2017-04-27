<?php

namespace App\Auth;

use App\Models\Admin;
use App\Models\Consumer;
use App\Models\Provider;
use Tymon\JWTAuth\JWTAuth;
use Auth;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;

/**
 * Class CustomJWTAuth
 * @package App\Auth
 */
class CustomJWTAuth extends JWTAuth
{

    /**
     * @return null|AuthenticatableUserContract
     */
    public function authenticate() : ?AuthenticatableUserContract
    {
        $id = $this->getPayload()->get('sub');
        $role = $this->getPayload()->get('role');

        $user = null;

        switch ($role) {
            case 'ROLE_PROVIDER':
                $user = Provider::find($id);
                break;
            case 'ROLE_CONSUMER':
                $user = Consumer::find($id);
                break;
            case 'ROLE_ADMIN':
                $user = Admin::find($id);
                break;
        }

        if (is_null($user)) {
            return null;
        }

        Auth::setUser($user);

        return $this->user();
    }
}