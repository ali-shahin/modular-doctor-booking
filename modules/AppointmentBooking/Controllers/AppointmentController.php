<?php

namespace Modules\AppointmentBooking\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\AppointmentBooking\UseCases\BookAppointmentUseCase;
use Modules\AppointmentBooking\UseCases\ListAvailableSlotsUseCase;

class AppointmentController extends Controller
{
    public function __construct(
        private ListAvailableSlotsUseCase $listAvailableSlotsUseCase,
        private BookAppointmentUseCase $bookAppointmentUseCase,
    ) {}

    public function index()
    {
        return response()->json(['message' => 'All Appointments']);
    }

    public function slots()
    {
        // list all available slots for booking
        $appointments = $this->listAvailableSlotsUseCase->execute();
        return response()->json($appointments);
    }

    public function book(Request $request)
    {
        // book an appointment
        $appointment = $this->bookAppointmentUseCase->execute(
            $request->input('patient_id'),
            $request->input('slot_id')
        );
        return response()->json($appointment);
    }
}
