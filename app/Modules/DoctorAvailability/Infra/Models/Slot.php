<?php

namespace DoctorAvailability\Infra\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $table = 'slots';
    public $timestamps = true;

    protected $fillable = [
        'time',
        'doctor_id',
        'doctor_name',
        'is_reserved',
        'cost',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
