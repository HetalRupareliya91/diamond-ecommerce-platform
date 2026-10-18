<?php

use App\Http\Controllers\Api\InventoryItemController;
use Illuminate\Support\Facades\Route;

Route::apiResource('inventory-items', InventoryItemController::class)->parameters(['inventory-items' => 'id']);
