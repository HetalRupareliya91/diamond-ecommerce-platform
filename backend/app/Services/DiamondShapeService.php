<?php

namespace App\Services;

use App\Models\DiamondShape;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DiamondShapeService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return DiamondShape::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): DiamondShape
    {
        return DiamondShape::create($data);
    }

    public function update(DiamondShape $model, array $data): DiamondShape
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(DiamondShape $model): void
    {
        $model->delete();
    }
}
