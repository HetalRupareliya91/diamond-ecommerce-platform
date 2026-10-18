<?php

namespace App\Policies;

use App\Models\WeddingBand;
use App\Models\User;

class WeddingBandPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, WeddingBand $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, WeddingBand $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, WeddingBand $model): bool
    {
        return (bool) $user->is_admin;
    }
}
