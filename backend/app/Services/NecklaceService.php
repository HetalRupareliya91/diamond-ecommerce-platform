<?php

namespace App\Services;

use App\Models\Necklace;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NecklaceService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Necklace::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Necklace
    {
        return Necklace::create($data);
    }

    public function update(Necklace $model, array $data): Necklace
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Necklace $model): void
    {
        $model->delete();
    }
}
