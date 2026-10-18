<?php

namespace App\Policies;

use App\Models\Necklace;
use App\Models\User;

class NecklacePolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Necklace $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Necklace $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Necklace $model): bool
    {
        return (bool) $user->is_admin;
    }
}
