<?php

namespace App\Services;

use App\Models\Wishlist;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WishlistService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Wishlist::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Wishlist
    {
        return Wishlist::create($data);
    }

    public function update(Wishlist $model, array $data): Wishlist
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Wishlist $model): void
    {
        $model->delete();
    }
}
