<?php

namespace Modules\AppointmentBooking\Entities;

use Ramsey\Uuid\Uuid;

class Slot
{
    public Uuid $id;

    public Uuid $doctor_id;

    public string $time;

    public bool $is_reserved; // default false
}
