<?php

namespace App\Policies;

use App\Models\Metal;
use App\Models\User;

class MetalPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Metal $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Metal $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Metal $model): bool
    {
        return (bool) $user->is_admin;
    }
}
