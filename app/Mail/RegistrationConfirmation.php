<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $events;
    public $ics;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($name, $email, $events, $ics)
    {
        $this->name = $name;
        $this->email = $email;
        $this->events = $events;
        $this->ics = $ics;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('mail.registration-confirmation')
            //->from('welcome@brentwood.bc.ca', 'Brentwood Admissions')
            ->subject('Confirmation - Brentwood Information Session')
            ->replyTo('admissions@brentwood.bc.ca', 'Brentwood Admissions');

            foreach ($this->ics as $key => $ics) {
                $email->attachData($ics, 'brentwood-info-session'.$key.'.ics', [
                    'mime' => 'text/calendar',
                ]);
            }

        return $email;

    }
}
