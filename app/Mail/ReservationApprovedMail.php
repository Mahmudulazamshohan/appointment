<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@dermatopsychologie.cz';
        $subject = 'Appointment Information!';
        $name = 'Ústav Dermatopsychologie';
                
        return $this->view('admin.emails.reservation_approved')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'name' => $this->data['name'] ])
                    ->with([ 'booking_date' => $this->data['booking_date'] ])
                    ->with([ 'booking_time' => $this->data['booking_time'] ]);
    }
}
