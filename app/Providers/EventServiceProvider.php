<?php

namespace App\Providers;

use App\Models\{
    Admin,
    Course,
    Lesson,
    User
};
use App\Observers\{
    AdminObserver,
    CourseObserver,
    LessonObserver,
    UserObserver
};
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Admin::observe(AdminObserver::class);
        User::observe(UserObserver::class);
        Course::observe(CourseObserver::class);
        Lesson::observe(LessonObserver::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
