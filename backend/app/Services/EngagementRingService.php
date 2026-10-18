<?php

namespace App\Services;

use App\Models\EngagementRing;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EngagementRingService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return EngagementRing::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): EngagementRing
    {
        return EngagementRing::create($data);
    }

    public function update(EngagementRing $model, array $data): EngagementRing
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(EngagementRing $model): void
    {
        $model->delete();
    }
}
