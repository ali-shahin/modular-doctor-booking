<?php

namespace Modules\AppointmentBooking\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\AppointmentBooking\Infra\Models\Appointment;

class BookingCreated
{
    use Dispatchable;

    public $time;

    public $doctorEmail;

    public $doctorName;

    public function __construct(
        public Appointment $booking,
        public $slot
    ) {
        $this->time = $slot->time;
        $this->doctorEmail = $slot->doctor->email;
        $this->doctorName = $slot->doctor->name;
    }
}
