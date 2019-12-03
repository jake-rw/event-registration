<?php

namespace JakeRw\EventRegistration;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use JakeRw\EventRegistration\Events\RegistrationPlaced
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventEventRegistrationServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegistrationPlaced::class => [
            'JakeRw\EventRegistration\Listeners\SendEventRegistrationNotification',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
