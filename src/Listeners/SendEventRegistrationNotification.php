<?php

namespace App\Listeners;

use JakeRw\EventRegistration\Events\RegistrationPlaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use JakeRw\EventRegistration\Mail\RegistrationNotificationAdmin as Notification;
use JakeRw\EventRegistration\Mail\RegistrationNotificationUser as UserNotification;
use Illuminate\Support\Facades\Mail;

class SendEventRegistrationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegistrationPlaced  $event
     * @return void
     */    
    public function handle(RegistrationPlaced $event)
    {
        $adminUsers = explode(',', config('custom.admin_emails'));
        $user   =  $event->registration->cf_email;

        if (app()->environment(['local', 'staging'])) {
            $adminUsers = [
                'jake.rudkin-wilson@cigroup.co.uk',
                'rosie.smith@cigroup.co.uk',
                'kelvin.akposoe@cigroup.co.uk'
            ];
            $user =  [
                'jake.rudkin-wilson@cigroup.co.uk',
                'rosie.smith@cigroup.co.uk',
                'kelvin.akposoe@cigroup.co.uk'
            ];
        }

        Mail::to($adminUsers)->send(new Notification($event->registration));
        Mail::to($user)->send(new UserNotification($event->registration));
    }
}
