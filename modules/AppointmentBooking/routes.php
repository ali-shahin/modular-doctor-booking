<?php

use Illuminate\Support\Facades\Route;
use Modules\AppointmentBooking\Controllers\AppointmentController;

Route::prefix('appointments')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/slots', [AppointmentController::class, 'slots'])->name('appointments.slots');
    Route::post('/book', [AppointmentController::class, 'book'])->name('appointments.book');
});
