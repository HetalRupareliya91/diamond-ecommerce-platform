<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'sku' => strtoupper(fake()->unique()->bothify('??-#####')),
            'quantity' => fake()->numberBetween(1, 100),
            'reorder_level' => fake()->numberBetween(1, 100),
        ];
    }
}
