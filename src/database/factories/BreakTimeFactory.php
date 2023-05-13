<?php

namespace Database\Factories;

use App\Models\WorkingHour;
use App\Models\BreakTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreakTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'working_hour_id' => WorkingHour::factory(),
            'break_start' => $this->faker->dateTimeBetween($startDate = '-3hours', $endDate = 'now', $timezone = null),
            'break_end' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2hours', $timezone = null),
        ];
    }
}
