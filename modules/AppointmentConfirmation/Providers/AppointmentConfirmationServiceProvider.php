<?php

namespace Modules\AppointmentConfirmation\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\AppointmentBooking\Events\BookingCreated;
use Modules\AppointmentConfirmation\Listeners\NotifyDoctor;
use Modules\AppointmentConfirmation\Listeners\NotifyPatient;

class AppointmentConfirmationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(
            BookingCreated::class,
            NotifyPatient::class
        );

        Event::listen(
            BookingCreated::class,
            NotifyDoctor::class
        );
    }

    public function register(): void
    {
        //
    }
}
