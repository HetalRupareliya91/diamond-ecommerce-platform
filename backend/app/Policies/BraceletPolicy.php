<?php

namespace App\Policies;

use App\Models\Bracelet;
use App\Models\User;

class BraceletPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Bracelet $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Bracelet $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Bracelet $model): bool
    {
        return (bool) $user->is_admin;
    }
}
