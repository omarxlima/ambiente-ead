<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    AdminRepository,
    CourseRepository,
    LessonRepository,
    ModuleRepository,
    SupportRepository,
    UserRepository,
};
use App\Repositories\{
    AdminRepositoryInterface,
    CourseRepositoryInterface,
    LessonRepositoryInterface,
    ModuleRepositoryInterface,
    SupportRepositoryInterface,
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

        $this->app->singleton( //bind cria uma instancia e armazena na memoria
            ModuleRepositoryInterface::class,
            ModuleRepository::class,
        );

        $this->app->singleton( //bind cria uma instancia e armazena na memoria
            LessonRepositoryInterface::class,
            LessonRepository::class,
        );
        $this->app->singleton( //bind cria uma instancia e armazena na memoria
            SupportRepositoryInterface::class,
            SupportRepository::class,
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
