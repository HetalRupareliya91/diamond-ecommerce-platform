<?php

use App\Http\Controllers\Api\NecklaceController;
use Illuminate\Support\Facades\Route;

Route::apiResource('necklaces', NecklaceController::class)->parameters(['necklaces' => 'id']);
