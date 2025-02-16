<?php

namespace Modules\AppointmentManagement\Shell\Repositories;

use Modules\AppointmentManagement\Core\OutboundPorts\IAppointmentRepository;
use Modules\AppointmentManagement\Core\Entities\Appointment;
use Modules\AppointmentManagement\Shell\Models\Appointment as AppointmentModel;

class AppointmentRepository implements IAppointmentRepository
{
    public function __construct(
        protected AppointmentModel $model,
    ) {}

    public function create(Appointment $appointment): ?Appointment
    {
        $model =  $this->model->create($appointment->toArray());
        if ($model) {
            return Appointment::fromArray($model->toArray());
        }
        return null;
    }

    public function update(Appointment $appointment): ?Appointment
    {
        $model = $this->model->where('id', $appointment->id)->first();
        if ($model) {
            $model->update($appointment->toArray());
            return Appointment::fromArray($model->toArray());
        }
        return null;
    }

    public function delete($id): bool
    {
        return $this->model->where('id', $id)->delete();
    }

    public function get($id): ?Appointment
    {
        $model = $this->model->where('id', $id)->first();
        if ($model) {
            return Appointment::fromArray($model->toArray());
        }
        return null;
    }

    public function findBy($criteria = [], $relations = [])
    {
        $collection = $this->model
            ->with($relations)
            ->where($criteria)->get();

        return $this->all($collection);
    }

    public function findByRelation($relation, $criteria)
    {
        $collection = $this->model
            ->whereHas($relation, function ($query) use ($criteria) {
                $query->where($criteria);
            })->get();

        return $this->all($collection);
    }

    public function all($collection = null)
    {
        $collection = $collection ?? $this->model->all();
        return $collection->map(function ($model) {
            return Appointment::fromArray($model->toArray());
        })->all();
    }
}
