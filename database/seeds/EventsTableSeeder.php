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
        $event->title = 'Langford';
        $event->start_date = '2019-01-31 18:30:00';
        $event->end_date = '2019-01-31 20:00:00';
        $event->location = 'Four Points by Sheraton - Victoria Gateway';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'White Rock';
        $event->start_date = '2019-02-11 09:00:00';
        $event->end_date = '2019-02-11 15:00:00';
        $event->location = 'Individual Appointments';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'West Van';
        $event->start_date = '2019-02-12 18:30:00';
        $event->end_date = '2019-02-12 20:00:00';
        $event->location = 'Hollyburn Country Club';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'Whistler';
        $event->start_date = '2019-02-13 18:30:00';
        $event->end_date = '2019-02-13 20:00:00';
        $event->location = 'Private Residence';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'Nanaimo';
        $event->start_date = '2019-02-25 18:30:00';
        $event->end_date = '2019-02-25 20:00:00';
        $event->location = 'Private Residence';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'Courtney';
        $event->start_date = '2019-02-28 18:30:00';
        $event->end_date = '2019-02-28 20:00:00';
        $event->location = 'Old House Hotel';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'Vancouver';
        $event->start_date = '2019-03-07 10:00:00';
        $event->end_date = '2019-03-07 19:00:00';
        $event->location = 'Westin Bayshore';
        $event->host_name = 'Clayton Johnston';
        $event->host_email = 'clayton.johnston@brentwood.bc.ca';
        $event->save();

        $event = new Event;
        $event->title = 'Prince George ';
        $event->start_date = '2019-04-11 18:00:00';
        $event->end_date = '2019-04-11 22:00:00';
        $event->location = 'Twisted Cork';
        $event->host_name = 'Crystal Harvey';
        $event->host_email = 'crystal.harvey@brentwood.bc.ca';
        $event->save();

    }
}
