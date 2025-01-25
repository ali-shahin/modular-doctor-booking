<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('doctors')->insert(
            [
                'id' => (string) Str::uuid(),
                'name' => 'Dr. John Doe',
                'email' => 'john@platform.app',
                'phone' => '1234567890',
                'specialization' => 'General Physician',
            ]
        );
    }
}
