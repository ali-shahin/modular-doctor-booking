<?php

namespace Modules\DoctorAvailability\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\DoctorAvailability\Infra\Models\Doctor;
use Modules\DoctorAvailability\Infra\Models\Slot;
use Modules\DoctorAvailability\Infra\Repositories\DoctorRepository;

class DoctorService
{
    public function __construct(
        private DoctorRepository $doctorRepository,
    ) {}

    public function getAllDoctors(): Collection
    {
        return $this->doctorRepository->all();
    }

    public function addDoctor(array $data): ?Doctor
    {
        return $this->doctorRepository->create($data);
    }

    public function getDoctor(string $id, $relations = []): ?Doctor
    {
        return $this->doctorRepository->find($id, $relations);
    }

    public function updateDoctor(string $id, array $data): ?Doctor
    {
        $data['id'] = $id;

        return $this->doctorRepository->update($data);
    }

    public function deleteDoctor(string $id): bool
    {
        return $this->doctorRepository->delete($id);
    }

    public function addSlot(string $doctorId, array $data): bool|Slot
    {
        $doctor = $this->getDoctor($doctorId);
        if (! $doctor) {
            return false;
        }

        $data['doctor_name'] = $doctor->name;
        $slot = $doctor->slots()->create($data);

        return $slot ? $slot : false;
    }

    public function getAvailableSlots(string $doctorId): Collection
    {
        $doctor = $this->getDoctor($doctorId, ['slots']);
        if (! $doctor) {
            return collect([]);
        }

        return $doctor->slots->where('is_reserved', false);
    }
}
