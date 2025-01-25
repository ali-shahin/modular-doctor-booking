<?php

use Illuminate\Support\Facades\Route;
use Modules\DoctorAvailability\Controllers\DoctorController;

Route::prefix('doctors')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/{id}', [DoctorController::class, 'show'])->name('doctors.show');
    Route::get('/{doctorId}/slots', [DoctorController::class, 'slots'])->name('doctors.slots');
    Route::post('/{doctorId}/add-slot', [DoctorController::class, 'addSlot'])->name('doctors.slots.add');
    Route::get('/{doctorId}/available-slots', [DoctorController::class, 'availableSlots'])->name('doctors.slots.available');
});
