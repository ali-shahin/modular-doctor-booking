<?php

namespace Modules\DoctorAvailability\Controllers;

use Modules\DoctorAvailability\Services\DoctorService;
use Modules\DoctorAvailability\Infra\Models\Doctor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DoctorController
{
    public function __construct(
        private DoctorService $doctorService,
    ) {}

    public function index(): Collection
    {
        return $this->doctorService->getAllDoctors();
    }

    public function show(string $id): ?Doctor
    {
        return $this->doctorService->getDoctor($id, ['slots']);
    }

    public function slots(string $id): Collection
    {
        return $this->doctorService->getDoctor($id)->slots;
    }

    public function addSlot(Request $request, string $id)
    {
        $validated = $request->validate([
            'time' => 'required|date_format:Y-m-d H:i:s',
            'cost' => 'required|numeric',
        ]);

        return $this->doctorService->addSlot($id, $validated);
    }

    public function availableSlots(string $id): Collection
    {
        return $this->doctorService->getAvailableSlots($id);
    }
}
