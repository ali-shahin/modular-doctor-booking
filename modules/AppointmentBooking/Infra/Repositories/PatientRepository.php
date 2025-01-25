<?php

namespace Modules\AppointmentBooking\Infra\Repositories;

use Modules\AppointmentBooking\Entities\Patient;

class PatientRepository
{
    public function find(int $id): ?Patient
    {
        // return Patient::find($id);
        return null;
    }
}
