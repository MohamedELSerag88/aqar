<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->truncate();
        Property::factory()->count(50)->create()->each(function ($property) {
            $featureIds = Feature::inRandomOrder()->limit(rand(2, 5))->pluck('id');
            $property->features()->sync($featureIds);
        });
    }
}
