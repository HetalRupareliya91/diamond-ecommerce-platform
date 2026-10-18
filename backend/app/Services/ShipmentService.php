<?php

namespace App\Services;

use App\Models\Shipment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ShipmentService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Shipment::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Shipment
    {
        return Shipment::create($data);
    }

    public function update(Shipment $model, array $data): Shipment
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Shipment $model): void
    {
        $model->delete();
    }
}
