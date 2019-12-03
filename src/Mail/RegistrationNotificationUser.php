<?php

namespace JakeRw\EventRegistration\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use JakeRw\EventRegistration\Models\Registration;

class RegistrationNotificationUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from    =  config('custom.mail_from_address');
        $subject = 'S&P Global Platts 2020 Registration';

        return $this->from($from)
                    ->subject($subject)
                    ->markdown('emails.registration.user-notification');
    }
}
