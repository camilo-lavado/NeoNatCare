<?php

namespace Database\Factories;

use App\Models\Screening;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Screening>
 */
class ScreeningFactory extends Factory
{
    protected $model = Screening::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total_score' => fake()->numberBetween(0, 9),
            'level' => 'Leve',
            'item10_alert' => false,
        ];
    }
}
