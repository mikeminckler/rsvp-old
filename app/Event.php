<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use Eluceo\iCal\Component\Calendar;
use Eluceo\iCal\Component\Event as iCalEvent;
use Eluceo\iCal\Component\Timezone;
use Eluceo\iCal\Property\Event\Organizer;

class Event extends Model
{

    protected $dates = ['start_date', 'end_date'];

    protected $appends = ['date'];

	public function ics()
    {

        $start_date = $this->start_date;
        $end_date = $this->end_date ? $this->end_date : $this->start_date->addMinutes(90);

        $vCal = new Calendar('Brentwood College School');
        $vTimezone = new Timezone(Carbon::now()->timezoneName);
        $vCal->setTimezone($vTimezone);

        $vEvent = new iCalEvent();
        $vEvent->setDtStart($start_date)
                ->setDtEnd($end_date)
                ->setSummary('Brentwood Info Session - '.$this->location);
        //$vEvent->setUseTimezone(true);
        $vEvent->setUseUtc(false);

        $organizer = new Organizer('MAILTO:admissions@brentwood.bc.ca', [
            'CN' => 'Brentwood College School'
        ]);
        $vEvent->setOrganizer($organizer);

        $vEvent->setLocation($this->location);

        $vCal->addComponent($vEvent);
        return $vCal->render(); 
	}


    public static function createEvent()
    {
        $event = new Event;
        $event->title = request()->input('title');
        $event->start_date = Carbon::parse(request()->input('start_date'));
        $event->end_date = request()->input('end_date') ? Carbon::parse(request()->input('end_date')) : null;
        $event->location = request()->input('location');
        $event->host_name = request()->input('host_name');
        $event->host_email = request()->input('host_email');
        $event->save();

        return $event;
    
    }

    public function getDateAttribute()
    {
        if ($this->all_day) {
            $date = $this->start_date->format('D M j, \'y');
        } else {
            $date = $this->start_date->format('D M j, \'y g:ia');
            if ($this->end_date) {
                $date .= '-'.$this->end_date->format('g:ia');
            } else {
                $date .= '-'.$this->start_date->addMinutes(90)->format('g:ia');
            }
        }
        return $date;
    }


}
