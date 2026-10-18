<?php

use App\Http\Controllers\Api\DiamondColorController;
use Illuminate\Support\Facades\Route;

Route::apiResource('diamond-colors', DiamondColorController::class)->parameters(['diamond-colors' => 'id']);
