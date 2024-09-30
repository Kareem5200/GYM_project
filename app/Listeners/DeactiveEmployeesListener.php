<?php

namespace App\Listeners;

use App\Notifications\DeactivateEmployeesNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeactiveEmployeesListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $event->trainer->notify(new DeactivateEmployeesNotification());
    }
}
