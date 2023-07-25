<?php

namespace Database\Factories\Contact;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->lastName()." ".fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'subject' => fake()->title(),
            'message' => fake()->text(200),

        ];
    }
}
