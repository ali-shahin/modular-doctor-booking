<?php

namespace DoctorAvailability\Infra\Repositories;

use DoctorAvailability\Infra\Models\Slot;

class SlotRepository extends BaseRepository
{
    public function __construct(Slot $model)
    {
        $this->setModel($model);
    }
}
