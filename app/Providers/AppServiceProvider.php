<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    AdminRepository,
    CourseRepository,

    UserRepository,
};
use App\Repositories\{
    AdminRepositoryInterface,
    CourseRepositoryInterface,
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

        $this->app->singleton( //bind cria uma instancia e armazena na memoria
            CourseRepositoryInterface::class,
            CourseRepository::class,
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
