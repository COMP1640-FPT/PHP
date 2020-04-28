<?php

use Illuminate\Database\Seeder;

class LearningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $year = 2020;
        $month = 4;
        $day = rand(21, 28);
        $student_tutor = [];
        $requests = [];
        $messages = [];

        for ($i = 8; $i <= 63; $i++) {
            array_push($student_tutor, [
                "student_id" => $i,
                "tutor_id" => rand(3, 7),
                "created_at" => \Carbon\Carbon::create($year, $month, $day, 0, 0, 0),
            ]);
        }
        DB::table('student_tutor')->insert($student_tutor);

        foreach ($student_tutor as $key => $value) {
            for($i = 0; $i <= rand(1, 10); $i++) {
                $status = ["Resolved", "Not Resolve"];
                array_push($requests, [
                    "student_id" => $value['student_id'],
                    "tutor_id" => $value['tutor_id'],
                    "type" => "message",
                    "status" => $status[rand(0, 1)],
                    "title" => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    "description" => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    "room" => $faker->ean13,
                    "rates" => rand(3, 5),
                    "created_at" => \Carbon\Carbon::create($year, $month, $day, 0, 0, 0),
                ]);
            }
        }
        DB::table('requests')->insert($requests);

        foreach ($requests as $key => $value) {
            for($i = 0; $i <= rand(1, 10); $i++) {
                $sender = [$value['student_id'], $value['tutor_id']];
                array_push($messages, [
                    "request_id" => $key,
                    "sender_id" => $sender[rand(0, 1)],
                    "content" => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    "file" => null,
                    "created_at" => \Carbon\Carbon::create($year, $month, $day, 0, 0, 0),
                ]);
            }
        }
        DB::table('messages')->insert($messages);
    }
}
