<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MembershipsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $plan)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    // public function toDatabase(object $notifiable){
    //     $user_id = auth()->id();

    //     return [
    //         'body'=>"You have a new membership from user id $user_id with a {$this->plan}. Click to check it",
    //         'route'=> $this->plan == "workoutPlan"  ?  route('employees.workUsersWithoutPlans') : route('employees.nutrationUsersWithoutPlans') ,
    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $user = auth()->user();

        return [
            'body'=>"You have a new membership from user id $user->id with a {$this->plan}. Click to check it",
            'route'=> $this->plan == "workoutPlan"  ? 'employees.workUsersWithoutPlans' : 'employees.nutrationUsersWithoutPlans' ,
            'image'=> $user->image
        ];
    }
}
