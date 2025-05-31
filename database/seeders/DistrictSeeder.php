<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\District;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//
        DB::table('districts')->truncate();
        $districts = [
            ['ar' => 'حي السلامة', 'en' => 'Al Salamah'],
            ['ar' => 'حي الصفا', 'en' => 'Al Safa'],
            ['ar' => 'حي النزهة', 'en' => 'Al Nuzha'],
            ['ar' => 'حي الروضة', 'en' => 'Al Rawdah'],
            ['ar' => 'حي النسيم', 'en' => 'Al Naseem'],
            ['ar' => 'حي الشفا', 'en' => 'Al Shifa'],
            ['ar' => 'حي العزيزية', 'en' => 'Al Aziziyah'],
            ['ar' => 'حي العليا', 'en' => 'Al Olaya'],
            ['ar' => 'حي المروج', 'en' => 'Al Muruj'],
            ['ar' => 'حي السليمانية', 'en' => 'Al Sulaymaniyah'],
            ['ar' => 'حي النرجس', 'en' => 'Al Narjis'],
            ['ar' => 'حي اليرموك', 'en' => 'Al Yarmouk'],
            ['ar' => 'حي الحمراء', 'en' => 'Al Hamra'],
            ['ar' => 'حي البوادي', 'en' => 'Al Bawadi'],
            ['ar' => 'حي الفيصلية', 'en' => 'Al Faisaliyah'],
            ['ar' => 'حي المرجان', 'en' => 'Al Marjan'],
            ['ar' => 'حي المروة', 'en' => 'Al Marwah'],
            ['ar' => 'حي السامر', 'en' => 'Al Samer'],
            ['ar' => 'حي الاجاويد', 'en' => 'Al Ajawid'],
            ['ar' => 'حي طيبة', 'en' => 'Taybah'],
            ['ar' => 'حي الروابي', 'en' => 'Al Rawabi'],
            ['ar' => 'حي العوالي', 'en' => 'Al Awali'],
            ['ar' => 'حي الربوة', 'en' => 'Al Rabwah'],
            ['ar' => 'حي بدر', 'en' => 'Badr'],
        ];
        foreach ($districts as $district) {
                District::create([
                    'name:en' => $district['en'],
                    'name:ar' => $district['ar'],
                    'direction_id' => Direction::inRandomOrder()->first()?->id
                ]);
        }
    }
}
