<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//
        DB::table('features')->truncate();
        $features = [
            ['ar' => 'ملحق', 'en' => 'Annex'],
            ['ar' => 'مصعد', 'en' => 'Elevator'],
            ['ar' => 'مكيف', 'en' => 'Air Conditioner'],
            ['ar' => 'توفر الكهرباء', 'en' => 'Electricity Available'],
            ['ar' => 'توفر صرف صحي', 'en' => 'Sewage Available'],
            ['ar' => 'مدخلين', 'en' => 'Two Entrances'],
            ['ar' => 'غرفة سائق', 'en' => 'Driver Room'],
            ['ar' => 'غرفة خادمة', 'en' => 'Maid Room'],
            ['ar' => 'مسبح', 'en' => 'Swimming Pool'],
            ['ar' => 'حوش', 'en' => 'Yard'],
            ['ar' => 'مدخل سيارة', 'en' => 'Car Entrance'],
        ];

        foreach ($features as $feature) {
            Feature::create([
                'name:en' => $feature['en'],
                'name:ar' => $feature['ar'],
            ]);
        }
    }
}
