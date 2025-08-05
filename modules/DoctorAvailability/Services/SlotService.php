<?php

namespace Modules\DoctorAvailability\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\DoctorAvailability\Contracts\SlotServiceContract;
use Modules\DoctorAvailability\Infra\Models\Slot;
use Modules\DoctorAvailability\Infra\Repositories\SlotRepository;

class SlotService implements SlotServiceContract
{
    public function __construct(private SlotRepository $slotRepository) {}

    public function getAvailableSlots(): Collection
    {
        return $this->slotRepository->findBy([
            'is_reserved' => false,
        ]);
    }

    public function getSlotById(string $slotId): Slot
    {
        /** @var \Modules\DoctorAvailability\Infra\Models\Slot $slot */
        if (! $slot = $this->slotRepository->find($slotId)) {
            throw new \Exception('Slot not found');
        }

        return $slot;
    }

    public function getAllSlots(): Collection
    {
        return $this->slotRepository->all();
    }

    public function addSlot(array $data): Slot
    {
        $slot = $this->slotRepository->create($data);
        if (! $slot) {
            throw new \Exception('Failed to create slot');
        }

        return $slot;
    }

    public function getSlot(string $slotId): Slot
    {
        $slot = $this->slotRepository->find($slotId);
        if (! $slot) {
            throw new \Exception('Slot not found');
        }

        return $slot;
    }

    public function updateSlot(string $slotId, array $data): Slot
    {
        $result = $this->slotRepository->update(array_merge($data, ['id' => $slotId]));
        if (! $result) {
            throw new \Exception('Failed to update slot');
        }

        return $result;
    }

    public function deleteSlot(string $slotId): bool
    {
        return $this->slotRepository->delete($slotId);
    }
}
