<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(MediaSeeder::class);
    }
}
