<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $attachmentPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $attachmentPath)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->attachmentPath = $attachmentPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->subject)
                    ->view('admin.enotification')
                    ->with([
                        'body' => $this->body,
                    ]);

        // Attach the file if provided
        if ($this->attachmentPath) {
            $mail->attach($this->attachmentPath);
        }

        return $mail;
    }
}
