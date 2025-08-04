<?php

namespace Modules\AppointmentManagement\Shell\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\AppointmentManagement\Core\InboundPorts\IAppointmentService;

class AppointmentsController extends Controller
{
    public function __construct(protected IAppointmentService $service) {}

    public function index(Request $request)
    {
        $validated = $request->validate([
            'doctorId' => 'required',
        ]);
        $appointments = $this->service->getAppointments($validated['doctorId']);

        return response()->json($appointments);
    }

    public function complete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        return $this->service->completeAppointment($validated['id'])->toJson();
    }

    public function cancel(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        return $this->service->cancelAppointment($validated['id'])->toJson();
    }
}
