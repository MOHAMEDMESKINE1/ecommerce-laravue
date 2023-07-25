<?php

namespace Database\Factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 10);
        $price = fake()->numberBetween(100, 500);
        $total = $quantity * $price ; 

        return [
            'quantity' => fake()->numberBetween(1,20),
            'price' => fake()->numberBetween(100,500),
            'total' => $total,
            'payment' => fake()->randomElement(['Paid','Not Paid']),
            'status' => fake()->randomElement(['Pending','Processing','Confirmed','Shipped','Delivered','On Hold','Cancelled']),
            'user_id' => fake()->numberBetween(1,5),
            'product_id' => fake()->numberBetween(1,5),
        ];

    }
}
