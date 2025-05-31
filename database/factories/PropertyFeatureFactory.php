<?php

namespace Database\Factories;

use App\Models\Feature;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class PropertyFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => Property::inRandomOrder()->first()?->id ?? Property::factory(),
            'feature_id' => Feature::inRandomOrder()->first()?->id ?? Feature::factory(),
        ];
    }
}
