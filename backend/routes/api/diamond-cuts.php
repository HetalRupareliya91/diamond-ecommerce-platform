<?php

use App\Http\Controllers\Api\DiamondCutController;
use Illuminate\Support\Facades\Route;

Route::apiResource('diamond-cuts', DiamondCutController::class)->parameters(['diamond-cuts' => 'id']);
