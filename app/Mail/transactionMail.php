<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class transactionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $transaction;
    public function __construct($details)
    {
        $this->transaction = $details;
    }
    public function build()
    {
        return $this->subject('Mail from E-Banking')->view('gmail.mail', $this->transaction);
    }

}
