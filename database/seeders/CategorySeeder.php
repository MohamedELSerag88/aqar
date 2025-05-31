<?php

namespace Database\Seeders;

use App\Models\Agreement;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//
        DB::table('categories')->truncate();

        $categories = [
            ['ar' => 'شقق للإيجار', 'en' => 'Rent Apartment'],
            ['ar' => 'أراضي للبيع', 'en' => 'Land for Sale'],
            ['ar' => 'فلل للبيع', 'en' => 'Villa for Sale'],
            ['ar' => 'دور للإيجار', 'en' => 'Floor for Rent'],
            ['ar' => 'فلل للإيجار', 'en' => 'Villa for Rent'],
            ['ar' => 'شقق للبيع', 'en' => 'Apartment for Sale'],
            ['ar' => 'عمائر للبيع', 'en' => 'Building for Sale'],
            ['ar' => 'محلات للإيجار', 'en' => 'Shops for Rent'],
            ['ar' => 'بيت للبيع', 'en' => 'House for Sale'],
            ['ar' => 'استراحة للبيع', 'en' => 'Rest House for Sale'],
            ['ar' => 'بيت للإيجار', 'en' => 'House for Rent'],
            ['ar' => 'مزرعة للبيع', 'en' => 'Farm for Sale'],
            ['ar' => 'استراحة للإيجار', 'en' => 'Rest House for Rent'],
            ['ar' => 'مكتب تجاري للإيجار', 'en' => 'Commercial Office for Rent'],
            ['ar' => 'أراضي للإيجار', 'en' => 'Land for Rent'],
            ['ar' => 'عمائر للإيجار', 'en' => 'Building for Rent'],
            ['ar' => 'مستودع للإيجار', 'en' => 'Warehouse for Rent'],
            ['ar' => 'مخيم للإيجار', 'en' => 'Camp for Rent'],
            ['ar' => 'غرف للإيجار', 'en' => 'Rooms for Rent'],
            ['ar' => 'محلات للبيع', 'en' => 'Shops for Sale'],
            ['ar' => 'دور للبيع', 'en' => 'Floor for Sale'],
            ['ar' => 'شاليه للإيجار', 'en' => 'Chalet for Rent'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name:en' => $category['en'],
                'name:ar' =>  $category['ar']
            ]);
        }
    }
}
