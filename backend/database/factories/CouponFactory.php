<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'code' => strtoupper(fake()->unique()->bothify('??-#####')),
            'discount_percent' => fake()->randomFloat(2, 5, 40),
            'expires_on' => fake()->date(),
            'is_active' => fake()->boolean(),
        ];
    }
}
