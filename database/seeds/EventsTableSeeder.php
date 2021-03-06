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
        $event->start_date = '2020-01-27 09:00:00';
        $event->end_date = '2020-01-27 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();

        $event = new Event;
        $event->title = 'West Vancouver';
        $event->start_date = '2020-01-28 9:00:00';
        $event->end_date = '2020-01-28 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();

        $event = new Event;
        $event->title = 'Yellowknife';
        $event->start_date = '2020-02-10 9:00:00';
        $event->end_date = '2020-02-10 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();

        $event = new Event;
        $event->title = 'Edmonton';
        $event->start_date = '2020-02-11 9:00:00';
        $event->end_date = '2020-02-11 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();

        $event = new Event;
        $event->title = 'Grand Priaire';
        $event->start_date = '2020-02-12 9:00:00';
        $event->end_date = '2020-02-12 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();

        $event = new Event;
        $event->title = 'Calgary';
        $event->start_date = '2020-02-13 9:00:00';
        $event->end_date = '2020-02-13 17:00:00';
        $event->location = 'One on One Meetings';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->all_day = true;
        $event->save();
    }
}
