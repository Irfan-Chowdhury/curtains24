<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMessageReceived extends Notification
{
    use Queueable;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }


    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // Send both mail and DB notification
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        $fullName = $notifiable->first_name . ' ' . $notifiable->last_name;
        
        return (new MailMessage)
            ->subject('New Contact Message')
            ->greeting('Hello ' . $fullName . ',')
            ->line('You have received a new contact message.')
            ->line('Name: ' . $this->contact->name)
            ->line('Phone: ' . $this->contact->phone)
            ->line('Message: ' . $this->contact->message)
            ->action('View Details', route('contact-us-messages.show', $this->contact->id))
            ->line('Thank you.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
			'data'=> __('A new contact message has been received'),
			'link' => route('contact-us-messages.show', $this->contact->id),
        ];
    }
}
