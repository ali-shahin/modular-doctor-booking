<?php

use Illuminate\Support\Facades\Route;
use Modules\DoctorAvailability\Controllers\DoctorController;

// add routes for doctor controller
Route::prefix('doctors')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/{id}', [DoctorController::class, 'show'])->name('doctors.show');
    Route::post('/slots', [DoctorController::class, 'addSlot'])->name('doctors.slots.add');
    Route::get('/{doctorId}/slots', [DoctorController::class, 'getAvailableSlots'])->name('doctors.slots.available');
});

// add routes for slot controller