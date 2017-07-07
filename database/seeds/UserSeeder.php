<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
       	$user->user_username = 'admin';
       	$user->user_password = bcrypt('admin');
       	$user->user_role = 1;
       	$user->user_name = 'Admin';
       	$user->save();

    }
}
