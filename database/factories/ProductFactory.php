<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->title(),
            'description' => fake()->text(100),
            'photo' => fake()->imageUrl(),
            'price' => fake()->numberBetween(100,500),
            'old_price' => fake()->numberBetween(500,900),
            'quantity' => fake()->numberBetween(1,20),
            'size' => fake()->randomElement(['XL', 'L', 'M', 'X','XS','S']),
            'color' => fake()->randomElement(['Red', 'Black', 'White', 'Yellow','Green']),
            'category_id' => fake()->numberBetween(1,5),
        ];
    }
}
