<?php

namespace JakeRw\EventRegistration;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JakeRw\EventRegistration\Skeleton\SkeletonClass
 */
class EventRegistrationFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'event-registration';
    }
}
