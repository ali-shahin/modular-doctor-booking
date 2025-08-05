<?php

namespace Modules\AppointmentBooking\Events;

use Illuminate\Foundation\Events\Dispatchable;

class BookingCreated
{
    use Dispatchable;

    public $time;

    public $doctorEmail;

    public $doctorName;

    public $patientEmail;

    public $patientName;

    public function __construct(
        public $booking,
        public $slot
    ) {
        $this->time = $slot->time;
        $this->doctorEmail = $slot->doctor->email;
        $this->doctorName = $slot->doctor->name;

        $this->patientEmail = $booking->patient->email;
        $this->patientName = $booking->patient->name;
    }
}
