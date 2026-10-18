<?php

namespace App\Policies;

use App\Models\RingSetting;
use App\Models\User;

class RingSettingPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, RingSetting $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, RingSetting $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, RingSetting $model): bool
    {
        return (bool) $user->is_admin;
    }
}
