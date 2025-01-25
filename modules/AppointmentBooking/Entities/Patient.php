<?php

namespace Modules\AppointmentBooking\Entities;

use Ramsey\Uuid\Guid\Guid;

class Patient
{
    public Guid $id;
    public string $name;
    public string $email;
}
