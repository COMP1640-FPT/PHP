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
            "name" => "Nguyen Huu Hai",
            "code" => "GCH10001",
            "role" => "student",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "hainhgch16440@fpt.edu.vn",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "To Hai Nam",
            "code" => "GCH10002",
            "role" => "student",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "namthgch16500@fpt.edu.vn",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Dang Xuan Khanh",
            "code" => "GCH10003",
            "role" => "student",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "khanhdxgch16549@fpt.edu.vn",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Nguyen Tran Tuan",
            "code" => "GCH10004",
            "role" => "student",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "tuanntgch16490@fpt.edu.vn",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Hoang The Viet",
            "code" => "GCH10005",
            "role" => "student",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "viethtgch16100@fpt.edu.vn",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Nguyễn Thúy Hà",
            "code" => "GCH10006",
            "role" => "student",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "0",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "hantgch16343@fpt.edu.vn",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);
    }
}
