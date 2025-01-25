<?php

namespace Modules\DoctorAvailability\Controllers;

use Modules\DoctorAvailability\Services\DoctorService;
use Modules\DoctorAvailability\Services\SlotService;
use Modules\DoctorAvailability\Infra\Models\Doctor;
use Modules\DoctorAvailability\Infra\Models\Slot;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DoctorController
{
    public function __construct(private DoctorService $doctorService, private SlotService $slotService) {}

    public function index(): Collection
    {
        // return all doctors
        $doctors = $this->doctorService->getAllDoctors();
        return $doctors;
    }

    public function show(string $id): ?Doctor
    {
        // return the doctor details with his slots.
        $doctor = $this->doctorService->getDoctor($id, ['slots']);
        return $doctor;
    }

    public function addSlot(Request $request): Slot
    {
        // add a slot to the doctor
        $validated = $request->validate([
            'doctor_id' => 'required',
            'time' => 'required|datetime',
            'cost' => 'required|numeric',
        ]);
        $slot = $this->slotService->addSlot($validated);
        return $slot;
    }

    public function getAvailableSlots(string $doctorId): Collection
    {
        // return the available slots for the doctor
        $availableSlots = $this->slotService->getAvailableSlots($doctorId);
        return $availableSlots;
    }
}
