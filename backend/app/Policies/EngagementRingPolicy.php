<?php

namespace App\Policies;

use App\Models\EngagementRing;
use App\Models\User;

class EngagementRingPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, EngagementRing $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, EngagementRing $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, EngagementRing $model): bool
    {
        return (bool) $user->is_admin;
    }
}
