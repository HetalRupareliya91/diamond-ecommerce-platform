<?php

namespace App\Services;

use App\Models\Diamond;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DiamondService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Diamond::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Diamond
    {
        return Diamond::create($data);
    }

    public function update(Diamond $model, array $data): Diamond
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Diamond $model): void
    {
        $model->delete();
    }
}
