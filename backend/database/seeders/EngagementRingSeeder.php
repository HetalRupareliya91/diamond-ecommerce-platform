<?php

namespace Database\Seeders;

use App\Models\EngagementRing;
use Illuminate\Database\Seeder;

class EngagementRingSeeder extends Seeder
{
    public function run(): void
    {
        EngagementRing::factory()->count(20)->create();
    }
}
