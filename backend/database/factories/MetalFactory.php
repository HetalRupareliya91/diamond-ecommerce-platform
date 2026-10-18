<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MetalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'purity' => fake()->randomElement(['14K', '18K', '22K', '950']),
            'price_per_gram' => fake()->randomFloat(2, 100, 50000),
            'is_active' => fake()->boolean(),
        ];
    }
}
