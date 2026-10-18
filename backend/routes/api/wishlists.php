<?php

use App\Http\Controllers\Api\WishlistController;
use Illuminate\Support\Facades\Route;

Route::apiResource('wishlists', WishlistController::class)->parameters(['wishlists' => 'id']);
