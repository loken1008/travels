<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    // use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $booking;
    public function __construct($booking)
    {
        $this->booking = $booking;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        // dd($this->booking);
        return [
            'user' => $this->booking->first_name . ' ' . $this->booking->last_name.' has booked'.' '.$this->booking->tour->tour_name,
            'id'=>$this->booking->id,
           'tour_name'=> $this->booking->tour->tour_name,
            'created_at'=>$this->booking->created_at,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'user' => $this->booking->first_name.''.$this->booking->last_name.' has booked '.$this->booking->tour->tour_name,
            'id'=>$this->booking->id,
            'tour_name' => $this->booking->tour->tour_name,
            'created_at' => $this->booking->created_at,
        ]);
    }

    public function broadcastType()
    {
        return 'booking';
    }
}
