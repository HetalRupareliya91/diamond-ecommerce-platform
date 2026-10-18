<?php

use App\Http\Controllers\Api\CartItemController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cart-items', CartItemController::class)->parameters(['cart-items' => 'id']);
