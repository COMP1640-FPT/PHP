<?php

namespace App\Jobs;

use App\Mail\TutorAssignNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailAssignTutor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $students;

    public function __construct($data, $students)
    {
        $this->data = $data;
        $this->students = $students;
    }

    public function handle()
    {
        foreach ($this->students as $student) {
            Mail::to($student->email)->send(new TutorAssignNotify($this->data, $student->name));
        }
    }
}
