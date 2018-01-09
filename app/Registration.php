<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Event;

class Registration extends Model
{


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function saveRegistration($name, $email, Event $event)
    {

        $registration = new Registration;
        $registration->name = $name;
        $registration->email = $email;
        $registration->event_id = $event->id;
        $registration->save();

        return $registration;


    }
}
