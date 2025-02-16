<?php

namespace Modules\AppointmentManagement\Core\OutboundPorts;

use Modules\AppointmentManagement\Core\Entities\Appointment;

interface IAppointmentRepository
{
    public function create(Appointment $appointment): ?Appointment;
    public function update(Appointment $appointment): ?Appointment;
    public function delete($id): bool;
    public function get($id): ?Appointment;
    public function findBy($criteria = [], $relations = []);
    public function findByRelation($relation, $criteria);
    public function all();
}
