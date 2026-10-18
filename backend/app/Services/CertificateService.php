<?php

namespace App\Services;

use App\Models\Certificate;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CertificateService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Certificate::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Certificate
    {
        return Certificate::create($data);
    }

    public function update(Certificate $model, array $data): Certificate
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Certificate $model): void
    {
        $model->delete();
    }
}
