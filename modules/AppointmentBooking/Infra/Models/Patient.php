<?php

namespace Modules\AppointmentBooking\Infra\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Patient extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
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

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
