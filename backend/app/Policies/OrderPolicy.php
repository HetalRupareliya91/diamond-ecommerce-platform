<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Order $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Order $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Order $model): bool
    {
        return (bool) $user->is_admin;
    }
}
