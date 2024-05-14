<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject($this->feedback['subject'])
                    ->view('emails.feedback')
                    ->with('subject', $this->feedback['subject'])
                    ->with('name', $this->feedback['name'])
                    ->with('description', $this->feedback['description'])
                    ->with('email', $this->feedback['email']);
    }
}
