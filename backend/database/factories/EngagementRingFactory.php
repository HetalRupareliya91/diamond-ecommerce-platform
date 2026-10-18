<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EngagementRingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'sku' => strtoupper(fake()->unique()->bothify('??-#####')),
            'metal' => fake()->randomElement(['18K White Gold', 'Platinum', '14K Rose Gold']),
            'price' => fake()->randomFloat(2, 100, 50000),
            'is_active' => fake()->boolean(),
        ];
    }
}
