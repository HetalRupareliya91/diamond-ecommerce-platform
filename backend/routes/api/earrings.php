<?php

use App\Http\Controllers\Api\EarringController;
use Illuminate\Support\Facades\Route;

Route::apiResource('earrings', EarringController::class)->parameters(['earrings' => 'id']);
