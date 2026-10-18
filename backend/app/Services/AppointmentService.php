<?php

namespace App\Services;

use App\Models\Appointment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AppointmentService
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Appointment::query()
            ->search($filters['search'] ?? null)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Appointment
    {
        return Appointment::create($data);
    }

    public function update(Appointment $model, array $data): Appointment
    {
        $model->fill($data)->save();

        return $model->refresh();
    }

    public function delete(Appointment $model): void
    {
        $model->delete();
    }
}
