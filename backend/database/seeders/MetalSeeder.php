<?php

namespace Database\Seeders;

use App\Models\Metal;
use Illuminate\Database\Seeder;

class MetalSeeder extends Seeder
{
    public function run(): void
    {
        Metal::factory()->count(20)->create();
    }
}
