<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use Carbon\Carbon;

class EventsController extends Controller
{

    public function load()
    {
        $events = Event::where('date', '>', Carbon::now())->orderBy('date')->get();
        return response()->json(['events' => $events]);
    }

    public function create()
    {
        $event = Event::createEvent();
        if ($event instanceof Event) {
            return response()->json(['success' => 'Event created']);
        }
    }

}
