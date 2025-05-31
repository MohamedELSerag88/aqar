<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->truncate();
        $cities = [
            ['ar' => 'الرياض', 'en' => 'Riyadh'],
            ['ar' => 'جدة', 'en' => 'Jeddah'],
            ['ar' => 'مكة المكرمة', 'en' => 'Mecca'],
            ['ar' => 'المدينة المنورة', 'en' => 'Medina'],
            ['ar' => 'الدمام', 'en' => 'Dammam'],
            ['ar' => 'الخبر', 'en' => 'Khobar'],
            ['ar' => 'الظهران', 'en' => 'Dhahran'],
            ['ar' => 'الطائف', 'en' => 'Taif'],
            ['ar' => 'بريدة', 'en' => 'Buraidah'],
            ['ar' => 'عنيزة', 'en' => 'Unaizah'],
            ['ar' => 'الجبيل', 'en' => 'Jubail'],
            ['ar' => 'الهفوف', 'en' => 'Hofuf'],
            ['ar' => 'الأحساء', 'en' => 'Al-Ahsa'],
            ['ar' => 'نجران', 'en' => 'Najran'],
            ['ar' => 'حائل', 'en' => 'Hail'],
            ['ar' => 'تبوك', 'en' => 'Tabuk'],
            ['ar' => 'أبها', 'en' => 'Abha'],
            ['ar' => 'خميس مشيط', 'en' => 'Khamis Mushait'],
            ['ar' => 'جازان', 'en' => 'Jazan'],
            ['ar' => 'صبيا', 'en' => 'Sabya'],
            ['ar' => 'بيشة', 'en' => 'Bisha'],
            ['ar' => 'الخرج', 'en' => 'Al-Kharj'],
            ['ar' => 'القطيف', 'en' => 'Qatif'],
            ['ar' => 'ينبع', 'en' => 'Yanbu'],
            ['ar' => 'الرس', 'en' => 'Ar Rass'],
            ['ar' => 'محايل عسير', 'en' => 'Mahayel Aseer'],
            ['ar' => 'الدوادمي', 'en' => 'Dawadmi'],
            ['ar' => 'الزلفي', 'en' => 'Al Zulfi'],
            ['ar' => 'رابغ', 'en' => 'Rabigh'],
            ['ar' => 'القنفذة', 'en' => 'Al Qunfudhah'],
            ['ar' => 'الليث', 'en' => 'Al Lith'],
        ];

        foreach ($cities as $city) {
            City::create([
                'name:en' => $city['en'],
                'name:ar' => $city['ar'],
                'country_id' =>Country::first()->id
            ]);
        }
    }
}
