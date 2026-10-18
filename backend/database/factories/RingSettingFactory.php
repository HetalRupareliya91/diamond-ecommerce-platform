<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RingSettingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'style' => fake()->word(),
            'base_price' => fake()->randomFloat(2, 100, 50000),
            'is_active' => fake()->boolean(),
        ];
    }
}
