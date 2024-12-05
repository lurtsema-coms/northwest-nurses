<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmailNotif extends Mailable
{
    use Queueable, SerializesModels;

    public $accountInfo;

    /**
     * Create a new message instance.
     */
    public function __construct($accountInfo)
    {
        $this->accountInfo = $accountInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Account Created')
            ->view('emails.new-account', $this->accountInfo);
    }
}
