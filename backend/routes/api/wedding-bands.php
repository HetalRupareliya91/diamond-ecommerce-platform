<?php

use App\Http\Controllers\Api\WeddingBandController;
use Illuminate\Support\Facades\Route;

Route::apiResource('wedding-bands', WeddingBandController::class)->parameters(['wedding-bands' => 'id']);
