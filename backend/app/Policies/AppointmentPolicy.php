<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;

class AppointmentPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Appointment $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Appointment $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Appointment $model): bool
    {
        return (bool) $user->is_admin;
    }
}
