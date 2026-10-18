<?php

use App\Http\Controllers\Api\AddressController;
use Illuminate\Support\Facades\Route;

Route::apiResource('addresses', AddressController::class)->parameters(['addresses' => 'id']);
