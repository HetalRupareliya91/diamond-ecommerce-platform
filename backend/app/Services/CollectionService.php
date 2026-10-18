<?php

namespace App\Services;

use App\Models\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CollectionService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Collection::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Collection
    {
        return Collection::create($data);
    }

    public function update(Collection $model, array $data): Collection
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Collection $model): void
    {
        $model->delete();
    }
}
