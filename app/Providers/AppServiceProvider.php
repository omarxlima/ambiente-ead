<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    AdminRepository,
    UserRepository,
};
use App\Repositories\{
    AdminRepositoryInterface,
    UserRepositoryInterface,
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton( //bind cria uma instancia e armazena na memoria
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->singleton( //bind cria uma instancia e armazena na memoria
            AdminRepositoryInterface::class,
            AdminRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
