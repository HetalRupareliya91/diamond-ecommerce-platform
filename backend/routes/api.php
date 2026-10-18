<?php

use Illuminate\Support\Facades\Route;

Route::get('/health', fn () => ['status' => 'ok']);

// Each module registers its own routes in routes/api/*.php
foreach (glob(__DIR__.'/api/*.php') as $routeFile) {
    require $routeFile;
}
