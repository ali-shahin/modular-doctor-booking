<?php

namespace Modules\DoctorAvailability\Services;

use Modules\DoctorAvailability\Infra\Models\Slot;
use Modules\DoctorAvailability\Infra\Repositories\SlotRepository;
use Illuminate\Database\Eloquent\Collection;
use Modules\DoctorAvailability\Contracts\SlotServiceContract;

class SlotService implements SlotServiceContract
{
    public function __construct(private SlotRepository $slotRepository) {}

    public function getAvailableSlots(): Collection
    {
        return $this->slotRepository->findBy([
            'is_reserved' => false
        ]);
    }

    public function getSlotById(string $slotId): Slot
    {
        return $this->slotRepository->find($slotId);
    }

    public function getAllSlots(): Collection
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
