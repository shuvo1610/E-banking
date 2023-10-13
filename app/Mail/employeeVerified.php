<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class employeeVerified extends Mailable
{
    use Queueable, SerializesModels;

    public $verified;
    public function __construct($details)
    {
        $this->verified = $details;
    }

    public function build()
    {

        return $this->subject('Mail from E-Banking')->view('gmail.details', $this->verified);
    }
}
