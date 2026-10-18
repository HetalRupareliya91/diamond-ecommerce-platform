<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->unique()->words(3, true)),
            'gateway' => fake()->randomElement(['razorpay', 'stripe', 'paypal']),
            'reference' => strtoupper(fake()->unique()->bothify('??-#####')),
            'amount' => fake()->randomFloat(2, 100, 50000),
            'status' => fake()->randomElement(['pending', 'processing', 'completed']),
        ];
    }
}
