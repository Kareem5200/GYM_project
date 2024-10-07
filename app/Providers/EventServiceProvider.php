<?php

namespace App\Providers;

use App\Events\ActiveEmployeeEvent;
use App\Events\ActiveEmployeesEvent;
use App\Events\DeactiveEmployeeEvent;
use Illuminate\Support\Facades\Event;
use App\Events\DeactiveEmployeesEvent;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ActiveEmployeeListener;
use App\Listeners\ActiveEmployeesListener;
use App\Listeners\DeactiveEmployeeListener;
use App\Listeners\DeactiveEmployeesListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        DeactiveEmployeeEvent::class=>[
            DeactiveEmployeeListener::class
        ],
        DeactiveEmployeesEvent::class=>[
            DeactiveEmployeesListener::class,
        ],
        ActiveEmployeeEvent::class=>[
            ActiveEmployeeListener::class,
        ],
        ActiveEmployeesEvent::class=>[
            ActiveEmployeesListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
