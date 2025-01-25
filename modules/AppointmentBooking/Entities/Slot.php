<?php

namespace Modules\AppointmentBooking\Entities;

use Ramsey\Uuid\Guid\Guid;

class Slot
{
    public Guid $id;
    public Guid $doctor_id;
    public string $time;
    public bool $is_reserved; // default false
}
