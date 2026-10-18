<?php

namespace App\Policies;

use App\Models\DiamondClarity;
use App\Models\User;

class DiamondClarityPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, DiamondClarity $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, DiamondClarity $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, DiamondClarity $model): bool
    {
        return (bool) $user->is_admin;
    }
}
