<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use Carbon\Carbon;

class EventsController extends Controller
{

    public function load()
    {
        $events = Event::where('start_date', '>', Carbon::now())->orderBy('start_date')->get();
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
