<?php

namespace Modules\AppointmentBooking\Infra\Repositories;

use Modules\AppointmentBooking\Infra\Models\Appointment;
use Modules\AppointmentBooking\Entities\Appointment as AppointmentEntity;
use Ramsey\Uuid\Guid\Guid;

class AppointmentRepository
{
    public function all(): array
    {
        $array = Appointment::all()->toArray();
        return array_map(function ($appointment) {
            return AppointmentEntity::fromArray($appointment);
        }, $array);
    }

    public function find(Guid $id): ?Appointment
    {
        return Appointment::find($id);
    }

    public function save(AppointmentEntity $appointment): ?Appointment
    {
        return Appointment::create($appointment->toArray());
    }

    public function delete(AppointmentEntity $appointment): bool
    {
        return Appointment::where('id', $appointment->getId())->delete();
    }
}
