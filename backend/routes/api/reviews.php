<?php

use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::apiResource('reviews', ReviewController::class)->parameters(['reviews' => 'id']);
