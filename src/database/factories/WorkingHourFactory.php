<?php

namespace Database\Factories;

use App\Models\WorkingHour;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkingHourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'working_start' => $this->faker->dateTimeBetween($startDate = '-5hours', $endDate = '-3hours', $timezone = null),
            'working_end' => $this->faker->dateTimeBetween($startDate = '+2hours', $endDate = '+4hours', $timezone = null),
        ];
    }
}
