<?php

namespace Modules\AppointmentBooking\Infra\Repositories;

use Modules\AppointmentBooking\Entities\Slot;

class SlotRepository
{
    public function find(int $id): ?Slot
    {
        // return Slot::find($id);
        return null;
    }

    public function all(): array
    {
        // return Slot::all()->toArray();
        return [];
    }
}
