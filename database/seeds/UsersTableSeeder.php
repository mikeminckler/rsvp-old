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
        $admin->email = 'mikeminckler@gmail.com';
        $admin->password = bcrypt('password');
        $admin->save();

    }
}
