<?php

namespace App\Listeners;

use App\Notifications\ActiveEmployeeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ActiveEmployeesListener
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

        Notification::send($event->trainers,new ActiveEmployeeNotification());
    }
}
