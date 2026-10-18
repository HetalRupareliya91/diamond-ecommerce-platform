<?php

namespace App\Policies;

use App\Models\Shipment;
use App\Models\User;

class ShipmentPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Shipment $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, Shipment $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, Shipment $model): bool
    {
        return (bool) $user->is_admin;
    }
}
