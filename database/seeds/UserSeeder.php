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
       	$user->username = '5110100003';
        $user->password = bcrypt('5110100003');
        $user->role = 2;
        $user->nama = 'dosen3';
        $user->save();
    }
}
