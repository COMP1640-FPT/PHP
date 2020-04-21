<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAssignNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $attStudents;
    public $detStudents;

    public function __construct($name, $attStudents, $detStudents)
    {
        $this->name = $name;
        $this->attStudents = $attStudents;
        $this->detStudents = $detStudents;
    }

    public function build()
    {
        return $this->from('comp1640.etutor@gmail.com')
            ->view('emails.assign-student')
            ->subject('Notification email');
    }
}
