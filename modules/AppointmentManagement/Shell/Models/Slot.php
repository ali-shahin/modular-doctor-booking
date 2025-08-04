<?php

namespace Modules\AppointmentManagement\Shell\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasUuids;

    protected $table = 'slots';

    protected $fillable = [
        'time',
        'doctor_id',
        'doctor_name',
        'is_reserved',
        'cost',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'slot_id');
    }
}
