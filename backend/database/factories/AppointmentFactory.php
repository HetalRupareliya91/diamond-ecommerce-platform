<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'email' => fake()->unique()->safeEmail(),
            'preferred_date' => fake()->date(),
            'notes' => fake()->paragraph(),
        ];
    }
}
