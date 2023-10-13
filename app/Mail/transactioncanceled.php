<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class transactioncanceled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $canceled;
    public function __construct($details)
    {
        $this->canceled = $details;
    }
    public function build()
    {

        return $this->subject('Mail from E-Banking')->view('gmail.canceled', $this->canceled);
    }


}
