<?php

namespace Modules\AppointmentConfirmation\Listeners;

use Illuminate\Support\Facades\Log;
use Modules\AppointmentBooking\Events\BookingCreated;

class NotifyPatient
{
    public function handle(BookingCreated $event)
    {

        $patientEmail = $event->patientEmail;
        $patientName = $event->patientName;

        $appointmentDate = $event->time;

        $subject = 'Appointment Confirmation';
        $message = "Dear $patientName,\n\nYour appointment is confirmed for $appointmentDate .\n\nThank you.";

        // mail($patientEmail, $subject, $message);
        Log::info("Email sent to $patientEmail with message: $message");
    }
}
