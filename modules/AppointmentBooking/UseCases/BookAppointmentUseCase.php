<?php

namespace Modules\AppointmentBooking\UseCases;

use DateTime;
use Modules\AppointmentBooking\Entities\Appointment;
use Modules\AppointmentBooking\Events\BookingCreated;
use Modules\AppointmentBooking\Infra\Repositories\AppointmentRepository;
use Modules\DoctorAvailability\Contracts\SlotServiceContract;
use Ramsey\Uuid\Uuid;

class BookAppointmentUseCase
{
    public function __construct(
        private AppointmentRepository $appointmentRepository,
        private SlotServiceContract $doctorService
    ) {}

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

        $slot = $this->doctorService->getSlotById($slot_id);
        event(new BookingCreated($appointment, $slot));

        // TODO: after booking the appointment, we need to update the slot to be reserved

        if ($appointment) {
            return $appointment->toArray();
        }

        return [];
    }
}
