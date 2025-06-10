<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//
        DB::table('users')->truncate();
        DB::table('user_types')->truncate();
        $types = [
            ['ar' => 'باحث عن عقار', 'en' => 'Property Seeker'],
            ['ar' => 'مالك', 'en' => 'Owner'],
            ['ar' => 'مسوق', 'en' => 'Marketer'],
            ['ar' => 'شركة', 'en' => 'Company'],
        ];

        foreach ($types as $type) {
            UserType::create([
                'name:en' => $type['en'],
                'name:ar' =>  $type['ar']
            ]);
        }
        User::create([
            'fname'=>'Test',
            'lname'=>'User',
            'email'=>'test@test.com',
            'password'=>bcrypt('123456'),
            'phone' => '0123456789',
            'bio' => fake('en')->text,
            'type_id' => UserType::inRandomOrder()->first()?->id,
        ]);
        User::factory()->count(20)->create();
    }
}
