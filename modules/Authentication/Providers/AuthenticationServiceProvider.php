<?php

namespace Modules\Authentication\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Authentication\Contracts\UserServiceContract;
use Modules\Authentication\Services\UserService;

class AuthenticationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        // $this->app->bind(UserServiceContract::class, UserService::class);
    }
}
