<?php

namespace Modules\DoctorAvailability\Infra\Repositories;

use Modules\DoctorAvailability\Infra\Models\Slot;

/**
 * @extends BaseRepository<\Modules\DoctorAvailability\Infra\Models\Slot>
 */
class SlotRepository extends BaseRepository
{
    public function __construct(Slot $model)
    {
        $this->setModel($model);
    }
}
