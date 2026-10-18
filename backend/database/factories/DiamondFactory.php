<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiamondFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'sku' => strtoupper(fake()->unique()->bothify('??-#####')),
            'carat' => fake()->randomFloat(2, 0.3, 5),
            'cut' => fake()->randomElement(['Excellent', 'Very Good', 'Good']),
            'color' => fake()->randomElement(['D', 'E', 'F', 'G', 'H']),
            'clarity' => fake()->randomElement(['IF', 'VVS1', 'VVS2', 'VS1', 'SI1']),
            'price' => fake()->randomFloat(2, 100, 50000),
            'is_active' => fake()->boolean(),
        ];
    }
}
