<?php

namespace App\Interfaces\Repositories;

use App\Models\Consumer;
use Illuminate\Support\Collection;

/**
 * Interface IConsumerRepository
 * @package App\Interfaces\Repositories
 */
interface IConsumerRepository
{
    /**
     * @param string $id
     * @return Consumer|null
     */
    public function findById(string $id) : ?Consumer;

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