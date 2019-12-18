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
        $event->start_date = '2020-02-10 18:30:00';
        $event->end_date = '2020-02-10 20:00:00';
        $event->location = '';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'West Vancouver';
        $event->start_date = '2020-02-11 18:30:00';
        $event->end_date = '2020-02-11 20:00:00';
        $event->location = '';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();


    }
}
