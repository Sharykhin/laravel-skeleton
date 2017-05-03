<?php

namespace App\Repositories\Provider;

use App\Interfaces\Repositories\IProviderRepository;
use App\Models\Provider;
use Illuminate\Support\Collection;
use DB;

/**
 * Class EloquentRepository
 * @package App\Repositories\Provider
 */
class EloquentRepository implements IProviderRepository
{
    /**
     * @param string $id
     * @return Provider|null
     */
    public function findById(string $id): ?Provider
    {
        return Provider::findOrFail($id);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return Provider::count();
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return Collection
     */
    public function findAll(int $offset, int $limit): Collection
    {
        return DB::table('providers')
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
        return Provider::where($criteria)->get();
    }
}
