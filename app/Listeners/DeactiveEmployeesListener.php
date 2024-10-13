<?php

namespace App\Listeners;

use App\Notifications\DeactiveEmployeeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

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

        Notification::send($event->trainers,new DeactiveEmployeeNotification());
    }
}
