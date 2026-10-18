<?php

namespace App\Services;

use App\Models\Address;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AddressService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Address::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Address
    {
        return Address::create($data);
    }

    public function update(Address $model, array $data): Address
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Address $model): void
    {
        $model->delete();
    }
}
