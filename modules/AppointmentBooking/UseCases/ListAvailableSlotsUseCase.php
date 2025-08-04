<?php

namespace Modules\AppointmentBooking\UseCases;

use Illuminate\Database\Eloquent\Collection;
use Modules\DoctorAvailability\Contracts\SlotServiceContract;

class ListAvailableSlotsUseCase
{
    public function __construct(private SlotServiceContract $slotProvider) {}

    public function execute(): Collection
    {
        return $this->slotProvider->getAvailableSlots();
    }
}

/*

// Example usage in case of shared kernel
$slotService = app(SlotServiceContract::class);
$listAvailableSlotsUseCase = new ListAvailableSlotsUseCase($slotService);
$availableSlots = $listAvailableSlotsUseCase->execute();

*/
