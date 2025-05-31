<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Direction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directions')->truncate();
        $prefixes = [
            ['ar' => 'غرب','en' =>'West'],
            ['ar' => 'شرق','en' =>'East'],
            ['ar' => 'شمال','en' =>'North'],
            ['ar' => 'جنوب','en' =>'South'],
        ];
        $cities = City::all();
        foreach ($cities as $city) {
            foreach ($prefixes as $index => $prefix) {
                Direction::create([
                    'name:ar' => "{$prefix['ar']} {$city->translate('ar')->name}",
                    'name:en' => "{$prefix['en']} {$city->translate('en')->name}",
                    'city_id' => $city->id,
                ]);
            }
        }
    }
}
