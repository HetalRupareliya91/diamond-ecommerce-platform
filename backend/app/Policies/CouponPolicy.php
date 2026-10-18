<?php

namespace App\Policies;

use App\Models\Coupon;
use App\Models\User;

class CouponPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Coupon $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Coupon $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Coupon $model): bool
    {
        return (bool) $user->is_admin;
    }
}
