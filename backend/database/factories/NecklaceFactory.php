<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NecklaceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'sku' => strtoupper(fake()->unique()->bothify('??-#####')),
            'length_cm' => fake()->randomFloat(2, 100, 50000),
            'price' => fake()->randomFloat(2, 100, 50000),
        ];
    }
}
