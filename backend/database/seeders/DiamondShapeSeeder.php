<?php

namespace Database\Seeders;

use App\Models\DiamondShape;
use Illuminate\Database\Seeder;

class DiamondShapeSeeder extends Seeder
{
    public function run(): void
    {
        DiamondShape::factory()->count(20)->create();
    }
}
