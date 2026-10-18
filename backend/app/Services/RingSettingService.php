<?php

namespace App\Services;

use App\Models\RingSetting;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RingSettingService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return RingSetting::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): RingSetting
    {
        return RingSetting::create($data);
    }

    public function update(RingSetting $model, array $data): RingSetting
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(RingSetting $model): void
    {
        $model->delete();
    }
}
