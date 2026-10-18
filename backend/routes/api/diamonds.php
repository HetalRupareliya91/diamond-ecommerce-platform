<?php

use App\Http\Controllers\Api\DiamondController;
use Illuminate\Support\Facades\Route;

Route::apiResource('diamonds', DiamondController::class)->parameters(['diamonds' => 'id']);
