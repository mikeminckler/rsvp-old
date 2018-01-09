<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Registration;

class RegistrationsController extends Controller
{


    public function index()
    {

        $registrations = Registration::whereHas('event', function($query) {
            $query->where('date', '>', Carbon::now());
        })->get();

        return view('registrations.index', compact('registrations'));

    }
}
