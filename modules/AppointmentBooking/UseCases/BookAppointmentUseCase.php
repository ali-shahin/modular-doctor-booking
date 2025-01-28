<?php

namespace Modules\AppointmentBooking\UseCases;

use DateTime;
use Modules\AppointmentBooking\Entities\Appointment;
use Modules\AppointmentBooking\Infra\Repositories\AppointmentRepository;
use Ramsey\Uuid\Uuid;
use Modules\AppointmentBooking\Events\BookingCreated;


class BookAppointmentUseCase
{
    public function __construct(private AppointmentRepository $appointmentRepository) {}

    public function execute(string $patient_id, string $slot_id, string $patient_name): array
    {
        $appointment = $this->appointmentRepository->save(
            new Appointment(
                slot_id: Uuid::fromString($slot_id),
                patient_id: Uuid::fromString($patient_id),
                patient_name: $patient_name,
                reserved_at: new DateTime('now')
            )
        );

        event(new BookingCreated($appointment));

        // TODO: after booking the appointment, we need to update the slot to be reserved

        if ($appointment) {
            return $appointment->toArray();
        }

        return [];
    }
}
