<?php

namespace App\Repositories\Consumer;

use App\Interfaces\Repositories\IConsumerRepository;
use App\Models\Consumer;
use Illuminate\Support\Collection;
use DB;

/**
 * Class EloquentRepository
 * @package App\Repositories\Consumer
 */
class EloquentRepository implements IConsumerRepository
{
    /**
     * @param string $id
     * @return Consumer|null
     */
    public function findById(string $id): ?Consumer
    {
        return Consumer::findOrFail($id);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return Consumer::count();
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return Collection
     */
    public function findAll(int $offset, int $limit): Collection
    {
        return DB::table('consumers')
            ->where('deleted_at', null)
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    /**
     * @param array $criteria
     * @return Collection
     */
    public function findByCriteria(array $criteria = []): Collection
    {
        return Consumer::where($criteria)->get();
    }
}
