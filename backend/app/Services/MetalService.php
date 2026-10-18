<?php

namespace App\Services;

use App\Models\Metal;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MetalService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Metal::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Metal
    {
        return Metal::create($data);
    }

    public function update(Metal $model, array $data): Metal
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Metal $model): void
    {
        $model->delete();
    }
}
