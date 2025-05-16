<?php

namespace Database\Factories;


use App\Models\Hall;
use App\Models\Show;
use App\Models\ShowTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Carbon\Carbon;

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
            'title' => fake()->city(),
            'description' => fake()->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id,
            'director' => fake()->name(),
            'image_path' => fake()->imageUrl(),
        ];
    }

    public function configure()
    {

        return $this->afterCreating(function (Show $show) {

            $futureDate = Carbon::now()->addDays(rand(1, 30));
            $times = ['12:00', '16:00', '20:00'];
            $startTime = $times[array_rand($times)];

            ShowTime::create([
                'show_id' => $show->id,
                'hall_id' => Hall::inRandomOrder()->first()->id,
                'date' => $futureDate->toDateString(),
                'start_time' => $startTime,
                'price' => fake()->randomFloat(2, 5, 30),
            ]);
        });
    }
}
