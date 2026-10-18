<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'order_number' => strtoupper(fake()->unique()->bothify('??-#####')),
            'status' => fake()->randomElement(['pending', 'processing', 'completed']),
            'total' => fake()->randomFloat(2, 100, 50000),
            'placed_on' => fake()->date(),
        ];
    }
}
