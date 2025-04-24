<?php

namespace Database\Factories;

use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'start_time' => fake()->time(),
            'date' => fake()->date(),
            'hall_id' => Hall::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'director' => fake()->name(),
            'base_price' => fake()->randomFloat(2, 0, 20),
            'image_path' => fake()->imageUrl(),
            
        ];
    }
}
