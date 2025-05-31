<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//
        DB::table('countries')->truncate();
        $countries = [
            ['ar' => 'السعوديه', 'en' => 'Saudi Arabia']
        ];

        foreach ($countries as $country) {
            Country::create([
                'name:en' => $country['en'],
                'name:ar' => $country['ar']
            ]);
        }
    }
}
