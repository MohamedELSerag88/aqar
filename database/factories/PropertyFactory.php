<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\District;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rentOptions = ['month', 'year', null];
        return [
            'title:en' => $this->faker->sentence(3),
            'description:en'  => $this->faker->paragraph(),
            'title:ar' =>$this->faker->sentence(3),
            'description:ar' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 100000, 2000000),
            'area' => $this->faker->randomFloat(2, 100, 1000),
            'age' =>rand(1,30),
            'floors' => rand(1,10),
            'furnished' => rand(0, 1),
            'rent_type' => $rentOptions[array_rand($rentOptions)],
            'street_width' => $this->faker->numberBetween(5, 30),
            'bathrooms' => $this->faker->numberBetween(1, 5),
            'halls' => $this->faker->numberBetween(1, 3),
            'apartments' => $this->faker->numberBetween(0, 3),
            'bedrooms' => $this->faker->numberBetween(1, 6),
            'purpose' => 'سكني',
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'district_id' => District::inRandomOrder()->first()?->id ?? District::factory(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'location' => json_encode([
                'lat' => $this->faker->latitude(),
                'lng' => $this->faker->longitude(),
            ]),
        ];
    }
}
