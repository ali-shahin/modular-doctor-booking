<?php

namespace Modules\DoctorAvailability\Services;

use Modules\DoctorAvailability\Infra\Models\Doctor;
use Modules\DoctorAvailability\Infra\Repositories\DoctorRepository;
use Illuminate\Database\Eloquent\Collection;

class DoctorService
{
    public function __construct(private DoctorRepository $doctorRepository) {}

    public function getAllDoctors(): Collection
    {
        return $this->doctorRepository->all();
    }

    public function addDoctor(array $data): Doctor
    {
        return $this->doctorRepository->create($data);
    }

    public function getDoctor(string $doctorId, $relations = []): ?Doctor
    {
        return $this->doctorRepository->find($doctorId, $relations);
    }

    public function updateDoctor(string $doctorId, array $data): Doctor
    {
        $data['id'] = $doctorId;
        return $this->doctorRepository->update($data);
    }

    public function deleteDoctor(string $doctorId): bool
    {
        return  $this->doctorRepository->delete($doctorId);
    }
}
