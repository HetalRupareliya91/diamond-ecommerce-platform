<?php

use App\Http\Controllers\Api\DiamondClarityController;
use Illuminate\Support\Facades\Route;

Route::apiResource('diamond-clarities', DiamondClarityController::class)->parameters(['diamond-clarities' => 'id']);
