<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterForEvents extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $events;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $events)
    {
        $this->name = $name;
        $this->email = $email;
        $this->events = $events;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.register-for-events')
            ->subject('Info Session Registration');
    }
}
