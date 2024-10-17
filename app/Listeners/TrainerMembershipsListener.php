<?php

namespace App\Listeners;

use App\Models\Employee;
use App\Notifications\MembershipsNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrainerMembershipsListener
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
        $trainer = Employee::findOrFail($event->trainer_id);
        $trainer->notify(new MembershipsNotification($event->plan));
    }
}
