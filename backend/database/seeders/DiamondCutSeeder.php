<?php

namespace Database\Seeders;

use App\Models\DiamondCut;
use Illuminate\Database\Seeder;

class DiamondCutSeeder extends Seeder
{
    public function run(): void
    {
        DiamondCut::factory()->count(20)->create();
    }
}
