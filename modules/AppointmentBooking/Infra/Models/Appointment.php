<?php

namespace Modules\AppointmentBooking\Infra\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Appointment extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $fillable = [
        'id',
        'slot_id',
        'patient_id',
        'patient_name',
        'reserved_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
