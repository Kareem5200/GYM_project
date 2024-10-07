<?php

namespace App\Listeners;

use App\Notifications\DeactiveEmployeeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeactiveEmployeeListener
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
        $event->trainer->notify(new DeactiveEmployeeNotification());
    }
}
