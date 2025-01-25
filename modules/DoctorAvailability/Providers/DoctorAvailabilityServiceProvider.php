<?php

namespace Modules\DoctorAvailability\Providers;

use Modules\DoctorAvailability\Services\DoctorService;
use Illuminate\Support\ServiceProvider;

class DoctorAvailabilityServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Infra/database/migrations');

        // register the seeder
        $this->publishes([
            __DIR__ . '/../Infra/database/seeders' => database_path('seeders'),
        ], 'seeders');
    }

    public function register(): void
    {
        // $this->app->bind(DoctorService::class, DoctorService::class);
    }
}
