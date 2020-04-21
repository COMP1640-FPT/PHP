<?php

namespace App\Jobs;

use App\Mail\StudentAssignNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailAssignStudent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $attStudents;
    protected $detStudents;
    protected $tutor;

    public function __construct($attStudents, $detStudents, $tutor)
    {
        $this->attStudents = $attStudents;
        $this->detStudents = $detStudents;
        $this->tutor = $tutor;
    }

    public function handle()
    {
        $tutor = $this->tutor;
        $attStudents = $this->attStudents;
        $detStudents = $this->detStudents;
        Mail::to($tutor->email)->send(new StudentAssignNotify($tutor->name, $attStudents, $detStudents));
    }
}
