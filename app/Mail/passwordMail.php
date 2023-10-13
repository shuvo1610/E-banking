<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class passwordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $forgot;
    public function __construct($data)
    {
        $this->forgot = $data;
    }

    public function build()
    {

        return $this->subject('Mail from E-Banking')->view('gmail.forgot', $this->forgot);
    }

}
