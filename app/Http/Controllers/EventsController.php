<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests\EventValidation;

class EventsController extends Controller
{

    public function load()
    {
        $events = Event::where('start_date', '>', Carbon::now())->orderBy('start_date')->get();
        return response()->json(['events' => $events]);
    }

    public function create(EventValidation $request)
    {
        $event = Event::saveEvent();
        if ($event instanceof Event) {
            return response()->json(['success' => 'Event created']);
        }
    }

    public function edit($id) 
    {
        $event = Event::findOrFail($id);

        return response()->json([
            'event' => $event,
        ]);   
    }

    public function update(EventValidation $request, $id) 
    {
        $event = Event::saveEvent($id);
        if ($event instanceof Event) {
            return response()->json(['success' => 'Event saved']);
        }
    }

}
