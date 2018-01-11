<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use Carbon\Carbon;

class EventsController extends Controller
{

    public function load()
    {
        $events = Event::where('date', '>', Carbon::now())->get()->sortBy('date');
        return response()->json(['events' => $events]);
    }

}
