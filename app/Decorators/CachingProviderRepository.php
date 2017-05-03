<?php

namespace App\Decorators;

use App\Interfaces\Repositories\IProviderRepository;
use App\Models\Provider;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Cache\Repository;

/**
 * Class CachingProviderRepository
 * @package App\Decorators
 */
class CachingProviderRepository implements IProviderRepository
{
    /** @var IProviderRepository $providerRepository */
    protected $providerRepository;

    /** @var Repository $cache */
    protected $cache;

    /**
     * CachingProviderRepository constructor.
     * @param IProviderRepository $providerRepository
     * @param Repository $cache
     */
    public function __construct(
        IProviderRepository $providerRepository,
        Repository $cache
    )
    {
        $this->providerRepository = $providerRepository;
        $this->cache = $cache;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return Collection
     */
    public function findAll(int $offset, int $limit): Collection
    {
        return $this->providerRepository->findAll($offset, $limit);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->cache->remember('providers.count', 60, function () {
            return $this->providerRepository->count();
        });
    }

    /**
     * @param string $id
     * @return Provider|null
     */
    public function findById(string $id): ?Provider
    {
        return $this->providerRepository->findById($id);
    }

    /**
     * @param array $criteria
     * @return Collection
     */
    public function findByCriteria(array $criteria = []): Collection
    {
        return $this->providerRepository->findByCriteria($criteria);
    }
}