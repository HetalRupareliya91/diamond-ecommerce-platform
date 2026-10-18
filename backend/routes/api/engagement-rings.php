<?php

use App\Http\Controllers\Api\EngagementRingController;
use Illuminate\Support\Facades\Route;

Route::apiResource('engagement-rings', EngagementRingController::class)->parameters(['engagement-rings' => 'id']);
