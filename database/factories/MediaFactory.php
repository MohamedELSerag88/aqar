<?php

namespace Database\Factories;


use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . '.jpg',
            'size' => (string) rand(100, 2048),
            'extension' => 'jpg',
            'type' => 'image',
            'path' => $this->faker->imageUrl(),
            'mediaable_id' => Property::inRandomOrder()->first()?->id ?? Property::factory(),
            'mediaable_type' => 'App\\Models\\Property',
        ];
    }
}
