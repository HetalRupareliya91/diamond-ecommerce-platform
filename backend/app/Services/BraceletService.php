<?php

namespace App\Services;

use App\Models\Bracelet;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BraceletService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Bracelet::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Bracelet
    {
        return Bracelet::create($data);
    }

    public function update(Bracelet $model, array $data): Bracelet
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Bracelet $model): void
    {
        $model->delete();
    }
}
