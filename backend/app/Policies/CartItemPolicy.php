<?php

namespace App\Policies;

use App\Models\CartItem;
use App\Models\User;

class CartItemPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, CartItem $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, CartItem $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, CartItem $model): bool
    {
        return (bool) $user->is_admin;
    }
}
