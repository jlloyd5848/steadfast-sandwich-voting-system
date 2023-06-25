<?php
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Verify Your Email')
            ->markdown('emails.verify-email');
    }
}
