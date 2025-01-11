<?php

namespace DoctorAvailability\Infra\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'specialization',
        'phone',
        'email',
    ];

    public function slots()
    {
        return $this->hasMany(Slot::class, 'doctor_id');
    }
}
