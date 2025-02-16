<?php

namespace Modules\AppointmentManagement\Core\Services;

use Modules\AppointmentManagement\Core\InboundPorts\IAppointmentService;
use Modules\AppointmentManagement\Core\OutboundPorts\IAppointmentRepository;
use Modules\AppointmentManagement\Core\Entities\Appointment;
use Modules\AppointmentManagement\Core\Enums\AppointmentStatusEnum;

class AppointmentService implements IAppointmentService
{
    public function __construct(
        private IAppointmentRepository $repository
    ) {}

    public function getAppointments($doctorId)
    {
        return $this->repository
            ->findByRelation('slot', ['doctor_id' => $doctorId]);
    }

    public function completeAppointment($id): ?Appointment
    {
        return $this->repository->update(new Appointment(
            id: $id,
            status: AppointmentStatusEnum::COMPLETED->value
        ));
    }

    public function cancelAppointment($id): ?Appointment
    {
        return $this->repository->update(new Appointment(
            id: $id,
            status: AppointmentStatusEnum::CANCELLED->value
        ));
    }
}
