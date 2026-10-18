<?php

namespace App\Services;

use App\Models\InventoryItem;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class InventoryItemService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return InventoryItem::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): InventoryItem
    {
        return InventoryItem::create($data);
    }

    public function update(InventoryItem $model, array $data): InventoryItem
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(InventoryItem $model): void
    {
        $model->delete();
    }
}
