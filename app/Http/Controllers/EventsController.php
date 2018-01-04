<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterForEvents;

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

        Mail::to('mike.minckler@brentwood.ca')->send(new RegisterForEvents($name, $email, $events));

        return response()->json(['success' => 'registered']);
    
    }
}
