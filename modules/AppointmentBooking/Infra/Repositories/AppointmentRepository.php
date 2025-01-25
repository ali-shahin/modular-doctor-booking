<?php

namespace Modules\AppointmentBooking\Infra\Repositories;

use Modules\AppointmentBooking\Entities\Appointment;


class AppointmentRepository
{
    public function all(): array
    {
        // return Appointment::all()->toArray();
        return [];
    }

    public function find(int $id): ?Appointment
    {
        // return Appointment::find($id);
        return null;
    }

    public function save(Appointment $appointment): void
    {
        // $appointment->save();
    }

    public function delete(Appointment $appointment): void
    {
        // $appointment->delete();
    }
}
