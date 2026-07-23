<?php

namespace Database\Factories;

use App\Models\MentalHealthLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MentalHealthLog>
 */
class MentalHealthLogFactory extends Factory
{
    protected $model = MentalHealthLog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'sleep_hours' => fake()->randomElement(['lt4', '4-6', '6-8', '8+']),
            'mood' => fake()->randomElement(['exhausted', 'low', 'normal', 'good', 'energetic']),
            'anxiety_level' => fake()->numberBetween(0, 100),
            'note' => fake()->optional()->sentence(),
        ];
    }
}
