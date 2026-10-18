<?php

namespace App\Services;

use App\Models\Earring;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EarringService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Earring::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Earring
    {
        return Earring::create($data);
    }

    public function update(Earring $model, array $data): Earring
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Earring $model): void
    {
        $model->delete();
    }
}
