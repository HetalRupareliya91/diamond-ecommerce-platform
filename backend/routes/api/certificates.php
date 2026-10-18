<?php

use App\Http\Controllers\Api\CertificateController;
use Illuminate\Support\Facades\Route;

Route::apiResource('certificates', CertificateController::class)->parameters(['certificates' => 'id']);
