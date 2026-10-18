<?php

namespace Database\Seeders;

use App\Models\DiamondColor;
use Illuminate\Database\Seeder;

class DiamondColorSeeder extends Seeder
{
    public function run(): void
    {
        DiamondColor::factory()->count(20)->create();
    }
}
