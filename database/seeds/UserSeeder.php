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
       	$user->username = '5114100110';
        $user->password = bcrypt('5114100110');
        $user->role = 1;
        $user->nama = 'Rafiar Rahmansyah';
        $user->save();
    }
}
