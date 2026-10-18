<?php

namespace App\Policies;

use App\Models\DiamondShape;
use App\Models\User;

class DiamondShapePolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, DiamondShape $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, DiamondShape $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, DiamondShape $model): bool
    {
        return (bool) $user->is_admin;
    }
}
