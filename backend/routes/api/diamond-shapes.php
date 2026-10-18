<?php

use App\Http\Controllers\Api\DiamondShapeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('diamond-shapes', DiamondShapeController::class)->parameters(['diamond-shapes' => 'id']);
