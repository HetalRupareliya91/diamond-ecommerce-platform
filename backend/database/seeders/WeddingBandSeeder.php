<?php

namespace Database\Seeders;

use App\Models\WeddingBand;
use Illuminate\Database\Seeder;

class WeddingBandSeeder extends Seeder
{
    public function run(): void
    {
        WeddingBand::factory()->count(20)->create();
    }
}
