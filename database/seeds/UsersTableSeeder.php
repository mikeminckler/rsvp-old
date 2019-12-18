<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->first_name = 'Mike';
        $admin->last_name = 'Minckler';
        $admin->email = 'mike.minckler@brentwood.ca';
        $admin->password = bcrypt('password');
        $admin->save();


        $georgia = new User;
        $georgia->first_name = 'Georgia';
        $georgia->last_name = 'Collins';
        $georgia->email = 'georgia.collins@brentwood.ca';
        $georgia->password = bcrypt('password');
        $georgia->save();
    }
}
