<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EarringFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'sku' => strtoupper(fake()->unique()->bothify('??-#####')),
            'style' => fake()->word(),
            'price' => fake()->randomFloat(2, 100, 50000),
        ];
    }
}
