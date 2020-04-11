<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class AppointmentMail extends Mailable
{
    use Sendgrid, Queueable, SerializesModels;

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


        return $this
            ->view('admin.emails.just-got-reservation')
            ->subject('Test')
            ->from($address)
            ->to(['rshdhsn6@gmail.com'])
            ->sendgrid([
                'personalizations' => [
                    [
                        'substitutions' => [
                            ':myname' => 's-ichikawa',
                        ],
                    ],
                ],
            ]);


        // return $this->view('admin.emails.just-got-reservation')
        //             ->from($address, $name)
        //             ->cc($address, $name)
        //             ->bcc($address, $name)
        //             ->replyTo($address, $name)
        //             ->subject($subject)
        //             ->with([ 'name' => $this->data['name'] ])
        //             ->with([ 'booking_date' => $this->data['booking_date'] ])
        //             ->with([ 'booking_time' => $this->data['booking_time'] ])
        //             ->with([ 'status' => $this->data['status'] ])
        //             ->sendgrid([
        //                 'personalizations' => [
        //                     [
        //                         'substitutions' => [
        //                             ':myname' => 's-ichikawa'
        //                         ],
        //                     ],
        //                 ],
        //             ]);
        // return $this->view('admin.emails.index')
        //             ->from($address, $name)
        //             ->cc($address, $name)
        //             ->bcc($address, $name)
        //             ->replyTo($address, $name)
        //             ->subject($subject)
        //             ->with([ 'appointment_message' => $this->data['message'] ]);
    }
}
