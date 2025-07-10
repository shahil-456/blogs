<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $subjectLine;
    public static $ccAddresses;

    public function __construct($details, $subjectLine="")
    {
        $this->details = $details;
        $this->subjectLine = "Comment Notify Mail";
        self::$ccAddresses = [env('MAIL_CC_ADDRESS')];
    }

    public function build()
    {
        $email = $this->subject($this->subjectLine)
            ->view('emails.lead_create');

        if (!empty(self::$ccAddresses)) {
            $email->cc(self::$ccAddresses);
        }

        return $email;
    }
}

