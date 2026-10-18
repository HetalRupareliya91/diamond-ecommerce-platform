<?php

namespace Database\Seeders;

use App\Models\DiamondClarity;
use Illuminate\Database\Seeder;

class DiamondClaritySeeder extends Seeder
{
    public function run(): void
    {
        DiamondClarity::factory()->count(20)->create();
    }
}
