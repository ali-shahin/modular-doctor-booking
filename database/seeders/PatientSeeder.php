<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\PatientFactory;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        PatientFactory::new()->count(10)->create();
    }
}
