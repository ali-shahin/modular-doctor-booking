<?php

namespace Modules\AppointmentConfirmation\Listeners;

use Illuminate\Support\Facades\Log;
use Modules\AppointmentBooking\Events\BookingCreated;

class NotifyDoctor
{
    public function handle(BookingCreated $event)
    {
        $doctorEmail = $event->doctorEmail;
        $doctorName = $event->doctorName;
        $appointmentDate = $event->time;

        $subject = 'Appointment Confirmation';
        $message = "Dear $doctorName,\n\nYour appointment is confirmed for $appointmentDate.\n\nThank you.";

        // mail($doctorEmail, $subject, $message);
        Log::info("Email sent to $doctorEmail with message: $message");
    }
}
