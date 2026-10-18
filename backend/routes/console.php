<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('store:about', function () {
    $this->info('Diamond e-commerce API');
});
