<?php

use App\Http\Controllers\Api\RingSettingController;
use Illuminate\Support\Facades\Route;

Route::apiResource('ring-settings', RingSettingController::class)->parameters(['ring-settings' => 'id']);
