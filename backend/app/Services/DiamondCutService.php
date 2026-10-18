<?php

namespace App\Services;

use App\Models\DiamondCut;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DiamondCutService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return DiamondCut::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): DiamondCut
    {
        return DiamondCut::create($data);
    }

    public function update(DiamondCut $model, array $data): DiamondCut
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(DiamondCut $model): void
    {
        $model->delete();
    }
}
