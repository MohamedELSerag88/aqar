<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Direction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\District>
 */
class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name:en' => $this->faker->streetName(),
            'direction_id' => Direction::inRandomOrder()->first()?->id ?? Direction::factory(),
        ];
    }
}
