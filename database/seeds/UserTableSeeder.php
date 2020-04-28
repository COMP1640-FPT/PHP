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
            "name" => "Tutor 1",
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
            "name" => "Tutor 2",
            "code" => "T10002",
            "role" => "tutor",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "tutor-2@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Tutor 3",
            "code" => "T10003",
            "role" => "tutor",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "tutor-3@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Tutor 4",
            "code" => "T10004",
            "role" => "tutor",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "tutor-4@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Tutor 5",
            "code" => "T10005",
            "role" => "tutor",
            "country" => "Vietnam",
            "address" => "PC",
            "gender" => "1",
            "phone" => "0123456789",
            "birthday" => "2020-03-24",
            "email" => "tutor-5@etutor.com",
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now(),
        ]);

        DB::table('users')->insert([
            "name" => "Nguyen Huu Hai",
            "code" => "GCH16440",
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
            "code" => "GCH16500",
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
            "code" => "GCH16549",
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
            "code" => "GCH16490",
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
            "code" => "GCH16100",
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
            "code" => "GCH16343",
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

        for ($i = 1; $i <= 50; $i++) {
            DB::table('users')->insert([
                "name" => "Student " . $i,
                "code" => "GCH1000" . $i,
                "role" => "student",
                "country" => "Vietnam",
                "address" => "PC",
                "gender" => rand(0, 1),
                "phone" => "0123456789",
                "birthday" => "2020-03-24",
                "email" => "student-" . $i . "@etutor.com",
                "updated_at" => Carbon::now(),
                "created_at" => Carbon::now(),
            ]);
        }
    }
}
