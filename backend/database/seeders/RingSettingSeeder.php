<?php

namespace Database\Seeders;

use App\Models\RingSetting;
use Illuminate\Database\Seeder;

class RingSettingSeeder extends Seeder
{
    public function run(): void
    {
        RingSetting::factory()->count(20)->create();
    }
}
