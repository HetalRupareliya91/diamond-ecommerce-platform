<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'product_sku' => strtoupper(fake()->unique()->bothify('??-#####')),
            'quantity' => fake()->numberBetween(1, 100),
            'unit_price' => fake()->randomFloat(2, 100, 50000),
        ];
    }
}
