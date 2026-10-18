<?php

namespace App\Services;

use App\Models\WeddingBand;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WeddingBandService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return WeddingBand::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): WeddingBand
    {
        return WeddingBand::create($data);
    }

    public function update(WeddingBand $model, array $data): WeddingBand
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(WeddingBand $model): void
    {
        $model->delete();
    }
}
