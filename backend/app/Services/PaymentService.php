<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaymentService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Payment::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Payment
    {
        return Payment::create($data);
    }

    public function update(Payment $model, array $data): Payment
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Payment $model): void
    {
        $model->delete();
    }
}
