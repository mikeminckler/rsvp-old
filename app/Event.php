<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Event extends Model
{

    protected $dates = ['date'];


    public function getDateAttribute($date) 
    {
        return Carbon::parse($date)->format('D j F g:ia');
    }
}
