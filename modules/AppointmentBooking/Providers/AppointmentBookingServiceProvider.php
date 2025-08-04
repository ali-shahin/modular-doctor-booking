<?php

namespace Modules\AppointmentBooking\Providers;

use Illuminate\Support\ServiceProvider;

class AppointmentBookingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Infra/database/migrations');
    }

    public function register(): void
    {
        //
    }
}
