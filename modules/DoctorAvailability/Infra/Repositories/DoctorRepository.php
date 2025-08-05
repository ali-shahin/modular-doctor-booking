<?php

namespace Modules\DoctorAvailability\Infra\Repositories;

use Modules\DoctorAvailability\Infra\Models\Doctor;

/**
 * @extends BaseRepository<\Modules\DoctorAvailability\Infra\Models\Doctor>
 */
class DoctorRepository extends BaseRepository
{
    public function __construct(Doctor $model)
    {
        $this->setModel($model);
    }
}
