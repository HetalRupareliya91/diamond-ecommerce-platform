<?php

namespace App\Services;

use App\Models\Coupon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CouponService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Coupon::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Coupon
    {
        return Coupon::create($data);
    }

    public function update(Coupon $model, array $data): Coupon
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Coupon $model): void
    {
        $model->delete();
    }
}
