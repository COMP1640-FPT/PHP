<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            "name" => "User Authorized Staff",
            "code" => "AS10001",
            "role" => "admin",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "astaff@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "User Tutor",
            "code" => "T10001",
            "role" => "tutor",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "tutor@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "User Staff",
            "code" => "S10001",
            "role" => "staff",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "staff@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "User Student",
            "code" => "GCH10001",
            "role" => "student",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "student@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);
    }
}
