<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'slug' => fake()->unique()->slug(),
            'launch_date' => fake()->date(),
            'is_featured' => fake()->boolean(),
        ];
    }
}
