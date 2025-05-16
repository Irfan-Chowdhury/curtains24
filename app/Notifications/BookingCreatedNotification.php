<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingCreatedNotification extends Notification
{
    use Queueable;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }


    public function via($notifiable)
    {
        return ['database','mail'];
    }

    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'title' => 'New Booking Scheduled',
    //         'data' => "{$this->booking->building_name} scheduled a booking from {$this->booking->start_time} to {$this->booking->end_time} on {$this->booking->date}.",
    //         'link' => route('booking-schedule.show', $this->booking->id), // or your desired route
    //     ];
    // }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return (new MailMessage)
                ->subject('New Booking Scheduled')
                ->greeting('Hello!')
                ->line("A new booking has been scheduled.")
                ->line("Building: {$this->booking->building_name}")
                ->line("Date: {$this->booking->date}")
                ->line("Time: {$this->booking->start_time} to {$this->booking->end_time}")
                ->action('View Booking', route('booking-schedule.index')) // or change route as needed
                ->line('Thank you for using our service!');
    }



    public function toArray($notifiable)
    {
        return [
            //
			'data'=> __('A new booking has been created'),
			'link' => route('booking-schedule.index'),
        ];
    }
}
