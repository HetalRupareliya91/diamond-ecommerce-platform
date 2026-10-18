<?php

use App\Http\Controllers\Api\BraceletController;
use Illuminate\Support\Facades\Route;

Route::apiResource('bracelets', BraceletController::class)->parameters(['bracelets' => 'id']);
