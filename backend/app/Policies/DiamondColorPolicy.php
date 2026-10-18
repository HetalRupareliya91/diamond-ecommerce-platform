<?php

namespace App\Policies;

use App\Models\DiamondColor;
use App\Models\User;

class DiamondColorPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, DiamondColor $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, DiamondColor $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, DiamondColor $model): bool
    {
        return (bool) $user->is_admin;
    }
}
