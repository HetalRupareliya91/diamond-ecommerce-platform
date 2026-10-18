<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;

class CustomerPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Customer $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Customer $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Customer $model): bool
    {
        return (bool) $user->is_admin;
    }
}
