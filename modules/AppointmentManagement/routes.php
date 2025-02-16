<?php

use Illuminate\Support\Facades\Route;
use Modules\AppointmentManagement\Shell\Controllers\AppointmentsController;

Route::group(['prefix' => 'appointments'], function () {
    Route::get('/{doctorId}', [AppointmentsController::class, 'index']);
    Route::put('/{id}/complete', [AppointmentsController::class, 'complete']);
    Route::put('/{id}/cancel', [AppointmentsController::class, 'cancel']);
});
