<?php

namespace App\Services;

use App\Models\CartItem;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CartItemService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return CartItem::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): CartItem
    {
        return CartItem::create($data);
    }

    public function update(CartItem $model, array $data): CartItem
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(CartItem $model): void
    {
        $model->delete();
    }
}
