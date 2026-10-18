<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->paragraph(),
            'is_active' => fake()->boolean(),
        ];
    }
}
