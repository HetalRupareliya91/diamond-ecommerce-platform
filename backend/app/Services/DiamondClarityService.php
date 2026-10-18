<?php

namespace App\Services;

use App\Models\DiamondClarity;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DiamondClarityService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return DiamondClarity::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): DiamondClarity
    {
        return DiamondClarity::create($data);
    }

    public function update(DiamondClarity $model, array $data): DiamondClarity
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(DiamondClarity $model): void
    {
        $model->delete();
    }
}
