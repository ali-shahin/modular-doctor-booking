<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerModules();
    }

    /**
     * Register all the service providers of the modules
     */
    private function registerModules(): void
    {
        $modules = config('module.modules');

        foreach ($modules as $module) {
            $provider = 'Modules\\' . $module . '\Providers\\' . $module . 'ServiceProvider';
            $this->app->register($provider);
        }
    }
}
