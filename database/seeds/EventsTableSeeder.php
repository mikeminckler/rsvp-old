<?php

use Illuminate\Database\Seeder;

use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $event = new Event;
        $event->title = 'Whistler';
        $event->start_date = '2020-01-28 09:00:00';
        $event->end_date = '2020-01-28 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();

        $event = new Event;
        $event->title = 'West Vancouver';
        $event->start_date = '2020-01-29 9:00:00';
        $event->end_date = '2020-01-29 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();


    }
}
