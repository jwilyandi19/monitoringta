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
       	$user->username = 'dosen01';
        $user->password = bcrypt('dosen01');
        $user->role = 2;
        $user->nama = 'Amaliya Rasyida, S.T., M.Sc.';
        $user->save();

        $user = new User();
        $user->username = 'dosen02';
        $user->password = bcrypt('dosen02');
        $user->role = 2;
        $user->nama = 'Vania Mitha Pratiwi, S.T., M.T.';
        $user->save();

    }
}
