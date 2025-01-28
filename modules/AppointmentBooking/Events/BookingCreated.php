<?php

namespace Modules\AppointmentBooking\Events;

use Illuminate\Foundation\Events\Dispatchable;

class BookingCreated
{
    use Dispatchable;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function handle()
    {
        // send email to the patient
        // send email to the doctor
    }
}
