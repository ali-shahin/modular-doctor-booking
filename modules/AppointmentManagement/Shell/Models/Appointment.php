<?php

namespace Modules\AppointmentManagement\Shell\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Appointment extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $table = 'appointments';

    protected $fillable = [
        'id',
        'slot_id',
        'patient_id',
        'patient_name',
        'reserved_at',
        'status',
    ];

    // protected $casts = [
    //     'reserved_at' => 'datetime',
    // ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class, 'slot_id');
    }
}
