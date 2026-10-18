<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'lab' => fake()->randomElement(['GIA', 'IGI', 'HRD']),
            'certificate_number' => strtoupper(fake()->unique()->bothify('??-#####')),
            'issued_on' => fake()->date(),
        ];
    }
}
