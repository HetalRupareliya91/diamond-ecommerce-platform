<?php

use App\Http\Controllers\Api\CollectionController;
use Illuminate\Support\Facades\Route;

Route::apiResource('collections', CollectionController::class)->parameters(['collections' => 'id']);
