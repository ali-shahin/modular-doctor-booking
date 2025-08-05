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

    public function addDoctor(array $data): Doctor
    {
        $docker = $this->doctorRepository->create($data);
        if (! $docker) {
            throw new \Exception('Failed to create doctor');
        }

        return $docker;
    }

    public function getDoctor(string $id, $relations = []): Doctor
    {
        $docker = $this->doctorRepository->find($id, $relations);
        if (! $docker) {
            throw new \Exception('Doctor not found');
        }

        return $docker;
    }

    public function updateDoctor(string $id, array $data): Doctor
    {
        $doctor = $this->doctorRepository->update(array_merge($data, ['id' => $id]));
        if (! $doctor) {
            throw new \Exception('Failed to update doctor');
        }

        return $doctor;
    }

    public function deleteDoctor(string $id): bool
    {
        return $this->doctorRepository->delete($id);
    }

    public function addSlot(string $doctorId, array $data): Slot
    {
        $doctor = $this->doctorRepository->find($doctorId);
        if (! $doctor) {
            throw new \Exception('Doctor not found');
        }

        $data['doctor_name'] = $doctor->name;
        $slot = $doctor->slots()->create($data);
        if (! $slot) {
            throw new \Exception('Failed to create slot');
        }

        return $slot;
    }

    public function getAvailableSlots(string $doctorId): Collection
    {
        $doctor = $this->doctorRepository->find($doctorId, ['slots']);
        if (! $doctor) {
            return new Collection;
        }

        return $doctor->slots->where('is_reserved', false);
    }
}
