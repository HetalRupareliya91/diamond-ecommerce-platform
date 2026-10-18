<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'carrier' => fake()->randomElement(['BlueDart', 'FedEx', 'DHL']),
            'tracking_number' => strtoupper(fake()->unique()->bothify('??-#####')),
            'shipped_on' => fake()->date(),
            'status' => fake()->randomElement(['pending', 'processing', 'completed']),
        ];
    }
}
