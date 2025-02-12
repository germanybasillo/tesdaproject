<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $assessment;

    public function __construct($assessment)
    {
        $this->assessment = $assessment;
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('Assessment Status Updated')
                    ->view('emails.status_updated')
                    ->with(['assessment' => $this->assessment]);
    }
}
