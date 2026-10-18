<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Order::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function update(Order $model, array $data): Order
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Order $model): void
    {
        $model->delete();
    }
}
