<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            'name' => 'Computing',
            'code' => 'GCH',
            'description' => 'Major Information of Technology',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        DB::table('majors')->insert([
            'name' => 'Graphic Design',
            'code' => 'GCD',
            'description' => 'Major Graphic Design',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        DB::table('majors')->insert([
            'name' => 'Business Administration',
            'code' => 'GBH',
            'description' => 'Major Information of Technology',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
