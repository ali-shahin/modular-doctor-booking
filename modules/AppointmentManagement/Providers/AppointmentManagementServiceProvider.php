<?php

namespace Modules\AppointmentManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\AppointmentManagement\Core\InboundPorts\IAppointmentService;
use Modules\AppointmentManagement\Core\OutboundPorts\IAppointmentRepository;
use Modules\AppointmentManagement\Core\Services\AppointmentService;
use Modules\AppointmentManagement\Shell\Repositories\AppointmentRepository;

class AppointmentManagementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Shell/database/migrations');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(IAppointmentService::class, AppointmentService::class);
        $this->app->bind(IAppointmentRepository::class, AppointmentRepository::class);
    }
}
