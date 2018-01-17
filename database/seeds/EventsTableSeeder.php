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
        $event->title = 'West Vancouver';
        $event->date = '2018-01-30 18:30:00';
        $event->location = 'Hollyburn Country Club';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();


        $event = new Event;
        $event->title = 'Whistler';
        $event->date = '2018-02-01 18:30:00';
        $event->location = 'Private venue available';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();


        $event = new Event;
        $event->title = 'Edmonton';
        $event->date = '2018-02-13 18:30:00';
        $event->location = 'Private venue available';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();


        $event = new Event;
        $event->title = 'Calgary';
        $event->date = '2018-02-14 18:30:00';
        $event->location = 'Hotel Arts';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();


        $event = new Event;
        $event->title = 'Kelowna';
        $event->date = '2018-02-15 18:30:00';
        $event->location = 'Hotel Eldorado';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();


        $event = new Event;
        $event->title = 'Courtenay';
        $event->date = '2018-02-26 18:30:00';
        $event->location = 'Crown Isle Resort & Golf Community';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();


        $event = new Event;
        $event->title = 'Nanaimo';
        $event->date = '2018-02-27 18:30:00';
        $event->location = 'Coast Bastion Hotel';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

    }
}
