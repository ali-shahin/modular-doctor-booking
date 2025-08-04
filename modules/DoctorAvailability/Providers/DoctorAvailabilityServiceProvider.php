<?php

namespace Modules\DoctorAvailability\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\DoctorAvailability\Contracts\SlotServiceContract;
use Modules\DoctorAvailability\Services\SlotService;

class DoctorAvailabilityServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Infra/database/migrations');
    }

    public function register(): void
    {
        // this is where we bind the SlotServiceContract to the SlotService, so that we can inject the SlotServiceContract in other classes
        $this->app->bind(
            SlotServiceContract::class,
            SlotService::class
        );
    }
}
