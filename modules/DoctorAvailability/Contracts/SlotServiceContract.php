<?php

namespace Modules\DoctorAvailability\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface SlotServiceContract
{
    public function getAvailableSlots(): Collection;
}
