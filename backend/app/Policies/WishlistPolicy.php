<?php

namespace App\Policies;

use App\Models\Wishlist;
use App\Models\User;

class WishlistPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Wishlist $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Wishlist $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Wishlist $model): bool
    {
        return (bool) $user->is_admin;
    }
}
