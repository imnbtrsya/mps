<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MentorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentor')->insert([
            [
                'user_id' => 1,
                'M_name' => 'Muhd Hakim bin Azrizal',
                'M_IC' => '950723062349',
                'M_gender' => 'Male',
                'M_address' => 'Lot 67, Taman Impian, Melaka',
                'M_phoneNum' => '0199875612',
                'M_email' => 'hakim09@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'M_name' => 'Nur Aisyah binti Adam',
                'M_IC' => '920902011076',
                'M_gender' => 'Female',
                'M_address' => 'No 987, Taman Jaya, Selangor ',
                'M_phoneNum' => '0179216178',
                'M_email' => 'aisyah21@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
