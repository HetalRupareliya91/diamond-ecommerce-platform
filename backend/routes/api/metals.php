<?php

use App\Http\Controllers\Api\MetalController;
use Illuminate\Support\Facades\Route;

Route::apiResource('metals', MetalController::class)->parameters(['metals' => 'id']);
