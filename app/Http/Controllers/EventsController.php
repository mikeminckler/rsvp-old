<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterForEvents;
use App\Mail\RegistrationConfirmation;

use Carbon\Carbon;

class EventsController extends Controller
{

    public function load()
    {
        $events = Event::where('date', '>', Carbon::now())->get()->sortBy('date');
        return response()->json(['events' => $events]);
    }

    public function register()
    {

        $name = request()->input('name');
        $email = request()->input('email');
        $events = Event::whereIn('id', request()->input('events'))->get();
        $ics = collect();

        foreach ($events as $event) {
            $ics->push($event->ics()); 
            Mail::to($event->host_email)->send(new RegisterForEvents($name, $email, $events));
        }


        Mail::to($email)->send(new RegistrationConfirmation($name, $email, $events, $ics));

        return response()->json(['success' => 'registered']);
    
    }
}
