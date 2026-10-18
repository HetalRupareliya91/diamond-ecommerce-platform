<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Review $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Review $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Review $model): bool
    {
        return (bool) $user->is_admin;
    }
}
