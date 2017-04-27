<?php

namespace App\Auth;

use App\Models\Consumer;
use App\Models\Provider;
use Tymon\JWTAuth\JWTAuth;
use Auth;

class CustomJWTAuth extends JWTAuth
{
    public function authenticate()
    {
        dd('as');
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
        }
        Auth::setUser($user);

        return $this->user();
    }
}