<?php
namespace App\Policies;

use App\Models\Provider;
use App\Auth\User;
use App\Facades\RoleManager;

/**
 * Class ProviderPolicy
 * @package App\Policies
 */
class ProviderPolicy
{
    /**
     * Check if a user can update a provider
     *
     * @param User $user
     * @param Provider $provider
     * @return bool
     */
    public function update(User $user, Provider $provider) : bool
    {
        return $user->id === $provider->id;
    }

    /**
     * Check if a user can delete a provider
     *
     * @param User $user
     * @param Provider $provider
     * @return bool
     */
    public function delete(User $user, Provider $provider) : bool
    {
        return (($user->id === $provider->id) || RoleManager::isGranted($user, $provider->getRole()));
    }
}