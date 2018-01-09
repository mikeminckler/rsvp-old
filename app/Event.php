<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use Eluceo\iCal\Component\Calendar;
use Eluceo\iCal\Component\Event as iCalEvent;
use Eluceo\iCal\Component\Timezone;

class Event extends Model
{

    protected $dates = ['date'];

	public function ics()
    {

        $vCal = new Calendar('Brentwood College School');
        $vTimezone = new Timezone(Carbon::now()->timezoneName);
        $vCal->setTimezone($vTimezone);

        $vEvent = new iCalEvent();
        $vEvent->setDtStart(Carbon::parse($this->date))
                ->setDtEnd(Carbon::parse($this->date)->addMinutes(90))
                ->setSummary('Brentwood Info Session - '.$this->location);
        $vEvent->setUseTimezone(true);
        $vCal->addComponent($vEvent);
        return $vCal->render(); 
	}



}
