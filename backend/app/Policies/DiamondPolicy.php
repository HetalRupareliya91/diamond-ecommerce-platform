<?php

namespace App\Policies;

use App\Models\Diamond;
use App\Models\User;

class DiamondPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Diamond $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Diamond $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Diamond $model): bool
    {
        return (bool) $user->is_admin;
    }
}
