<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiamondShapeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'code' => strtoupper(fake()->unique()->bothify('??-#####')),
            'sort_order' => fake()->numberBetween(1, 100),
            'is_active' => fake()->boolean(),
        ];
    }
}
