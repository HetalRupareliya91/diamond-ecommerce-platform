<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiamondColorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'grade' => fake()->randomElement(['A', 'B', 'C', 'Premium']),
            'description' => fake()->paragraph(),
            'sort_order' => fake()->numberBetween(1, 100),
        ];
    }
}
