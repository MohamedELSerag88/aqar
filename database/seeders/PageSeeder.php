<?php

namespace Database\Seeders;

use App\Models\Agreement;
use App\Models\Category;
use App\Models\Client;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//
        DB::table('pages')->truncate();

        Page::create([
            'text:en' => 'About Us',
            'text:ar' => 'بعض المعلومات عنا',
            'slug' => 'about',
        ]);
        Page::create([
            'text:en' => 'Terms and Conditions',
            'text:ar' => 'الاتفاقيات والشروط',
            'slug' => 'Terms_and_Conditions',
        ]);
    }
}
