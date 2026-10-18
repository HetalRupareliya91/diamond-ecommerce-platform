<?php

namespace App\Policies;

use App\Models\Earring;
use App\Models\User;

class EarringPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Earring $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Earring $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Earring $model): bool
    {
        return (bool) $user->is_admin;
    }
}
