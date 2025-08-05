<?php

namespace Modules\DoctorAvailability\Infra\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $name
 * @property string $specialization
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Database\Eloquent\Collection $slots
 */
class Doctor extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'doctors';

    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'specialization',
        'phone',
        'email',
    ];

    // Automatically generate a UUID for the 'id' column
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function slots()
    {
        return $this->hasMany(Slot::class, 'doctor_id');
    }
}
