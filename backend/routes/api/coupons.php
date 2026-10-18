<?php

use App\Http\Controllers\Api\CouponController;
use Illuminate\Support\Facades\Route;

Route::apiResource('coupons', CouponController::class)->parameters(['coupons' => 'id']);
