<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class BookingMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tourbooking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tourbooking)
    {
        $this->tourbooking=$tourbooking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Mail For TourBooking ')->view('emails.tourbooking');
    }
}
