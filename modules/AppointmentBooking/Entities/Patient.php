<?php

namespace Modules\AppointmentBooking\Entities;

use Ramsey\Uuid\Uuid;

class Patient
{
    public Uuid $id;
    public string $name;
    public string $email;
}
