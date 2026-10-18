<?php

namespace App\Policies;

use App\Models\Collection;
use App\Models\User;

class CollectionPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Collection $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Collection $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Collection $model): bool
    {
        return (bool) $user->is_admin;
    }
}
