<?php

namespace Database\Factories;

use App\Models\Newborn;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Newborn>
 */
class NewbornFactory extends Factory
{
    protected $model = Newborn::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->firstName(),
            'birth_date' => fake()->dateTimeBetween('-28 days', 'now'),
            'gestational_weeks' => fake()->numberBetween(37, 41),
            'apgar_minute_1' => fake()->numberBetween(7, 10),
            'apgar_minute_5' => fake()->numberBetween(8, 10),
        ];
    }
}
