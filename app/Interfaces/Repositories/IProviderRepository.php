<?php

namespace App\Interfaces\Repositories;

use App\Models\Provider;
use Illuminate\Support\Collection;

/**
 * Interface IProviderRepository
 * @package App\Interfaces\Repositories
 */
interface IProviderRepository
{
    /**
     * @param string $id
     * @return Provider|null
     */
    public function findById(string $id) : ?Provider;

    /**
     * @param int $offset
     * @param int $limit
     * @return Collection
     */
    public function findAll(int $offset, int $limit) : Collection;

    /**
     * @return int
     */
    public function count() : int;

    /**
     * @param array $criteria
     * @return Collection
     */
    public function findByCriteria(array $criteria = []) : Collection;
}