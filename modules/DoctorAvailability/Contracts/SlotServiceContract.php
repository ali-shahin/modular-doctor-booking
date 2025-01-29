<?php

namespace Modules\DoctorAvailability\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface SlotServiceContract
{
    public function getAvailableSlots(): Collection;
    public function getSlotById(string $slotId): Model;
}
