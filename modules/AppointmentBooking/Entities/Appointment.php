<?php

namespace Modules\AppointmentBooking\Entities;

use Ramsey\Uuid\Guid\Guid;
use DateTime;

class Appointment
{
    public Guid $id;
    public Guid $slot_id;
    public Guid $patient_id;
    public string $patient_name;
    public datetime $reserved_at;
}
