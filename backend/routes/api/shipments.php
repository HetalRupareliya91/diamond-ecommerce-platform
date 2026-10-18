<?php

use App\Http\Controllers\Api\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('shipments', ShipmentController::class)->parameters(['shipments' => 'id']);
