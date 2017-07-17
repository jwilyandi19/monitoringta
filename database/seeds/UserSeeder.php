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
       	$user->username = 'raf';
        $user->password = bcrypt('raf');
        $user->role = 3;
        $user->nama = 'rafiar';
        $user->save();
    }
}
