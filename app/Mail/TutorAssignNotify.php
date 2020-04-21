<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorAssignNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $name;

    public function __construct($data, $name)
    {
        $this->data = $data;
        $this->name = $name;
    }

    public function build()
    {
        return $this->from('comp1640.etutor@gmail.com')
            ->view('emails.assign-tutor')
            ->subject('Notification email');
    }
}
