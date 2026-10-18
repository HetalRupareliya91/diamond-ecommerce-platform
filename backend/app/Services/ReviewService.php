<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReviewService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Review::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Review
    {
        return Review::create($data);
    }

    public function update(Review $model, array $data): Review
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Review $model): void
    {
        $model->delete();
    }
}
