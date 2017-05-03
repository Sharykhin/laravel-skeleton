<?php

namespace App\Listeners;

use App\Events\ProviderRemoved;
use App\Interfaces\Repositories\IProviderRepository;
use Illuminate\Contracts\Cache\Repository;

/**
 * Class ProviderRemoved
 * @package App\Listeners
 */
class ProviderRemove
{
    /** @var Repository $cache */
    protected $cache;

    /** @var IProviderRepository $providerRepository */
    protected $providerRepository;

    /**
     * ProviderRemove constructor.
     * @param Repository $cache
     * @param IProviderRepository $providerRepository
     */
    public function __construct(
        Repository $cache,
        IProviderRepository $providerRepository
    )
    {
        $this->cache = $cache;
        $this->providerRepository = $providerRepository;
    }

    public function handle(ProviderRemoved $event) : void
    {
        $this->cache->forget('providers.count');
        $this->cache->remember('providers.count', 60, function () {
            return $this->providerRepository->count();
        });
    }
}
