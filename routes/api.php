<?php

require base_path('app/Modules/AppointmentBooking/routes.php');
require base_path('app/Modules/AppointmentConfirmation/routes.php');
require base_path('app/Modules/AppointmentManagement/routes.php');
require base_path('app/Modules/DoctorAvailability/routes.php');
require base_path('app/Modules/Authentication/routes.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
