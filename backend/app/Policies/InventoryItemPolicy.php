<?php

namespace App\Policies;

use App\Models\InventoryItem;
use App\Models\User;

class InventoryItemPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, InventoryItem $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, InventoryItem $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, InventoryItem $model): bool
    {
        return (bool) $user->is_admin;
    }
}
