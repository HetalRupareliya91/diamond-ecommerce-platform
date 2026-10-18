<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'product_sku' => strtoupper(fake()->unique()->bothify('??-#####')),
            'notes' => fake()->paragraph(),
        ];
    }
}
