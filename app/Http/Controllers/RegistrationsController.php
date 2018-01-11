<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

use App\Registration;
use App\Mail\RegisterForEvents;
use App\Mail\RegistrationConfirmation;

use App\Event;

class RegistrationsController extends Controller
{

    protected $registration;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    public function index()
    {

        $registrations = Registration::whereHas('event', function($query) {
            $query->where('date', '>', Carbon::now());
        })->with('event')->get()->sortBy(function($registration) {
            return $registration->event->date;
        });

        return view('registrations.index', compact('registrations'));

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
            $this->registration->saveRegistration($name, $email, $event);
        }

        Mail::to($email)->send(new RegistrationConfirmation($name, $email, $events, $ics));

        return response()->json(['success' => 'registered']);
    
    }
}
