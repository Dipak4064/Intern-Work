<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factorie>
 */
class FactorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'established_date' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'location' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'password' => fake()->password(),
        ];
    }
}
