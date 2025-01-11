<?php

namespace DoctorAvailability\Services;

use DoctorAvailability\Infra\Models\Slot;
use DoctorAvailability\Infra\Repositories\SlotRepository;

class SlotService
{
    protected $slotRepository;

    public function __construct(SlotRepository $slotRepository)
    {
        $this->slotRepository = $slotRepository;
    }

    public function getSlots(): array
    {
        return $this->slotRepository->all();
    }

    public function addSlot(array $data): Slot
    {
        return $this->slotRepository->create($data);
    }

    public function getSlot(string $slotId): Slot
    {
        return $this->slotRepository->find($slotId);
    }

    public function updateSlot(string $slotId, array $data): Slot
    {
        $data['id'] = $slotId;
        return $this->slotRepository->update($data);
    }

    public function deleteSlot(string $slotId): bool
    {
        return  $this->slotRepository->delete($slotId);
    }
}
