<?php

namespace App\Services;

use App\Models\DiamondColor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DiamondColorService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return DiamondColor::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): DiamondColor
    {
        return DiamondColor::create($data);
    }

    public function update(DiamondColor $model, array $data): DiamondColor
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(DiamondColor $model): void
    {
        $model->delete();
    }
}
