<?php

namespace Database\Factories\Payment;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment' => fake()->randomElement(['Cash','Stripe']),
            'user_id' => fake()->numberBetween(1,5),
            'order_id' => fake()->numberBetween(1,5),

        ];
    }
}
