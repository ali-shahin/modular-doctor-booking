<?php

namespace Modules\AppointmentManagement\Core\InboundPorts;

interface IAppointmentService
{
    public function getAppointments($doctorId);
    public function completeAppointment($id);
    public function cancelAppointment($id);
}
