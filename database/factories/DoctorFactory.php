<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\DoctorAvailability\Infra\Models\Doctor;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'specialization' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
