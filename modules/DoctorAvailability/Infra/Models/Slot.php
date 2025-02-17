<?php

namespace Modules\DoctorAvailability\Infra\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Slot extends Model
{
    use HasUuids;

    protected $table = 'slots';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'time',
        'doctor_id',
        'doctor_name',
        'is_reserved',
        'cost',
    ];

    // Automatically generate a UUID for the 'id' column
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
