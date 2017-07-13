<?php

use Illuminate\Database\Seeder;
use App\User;
use DB;

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
       	$username = '5114100109';
        $password = bcrypt('5114100109');
        $role = 1;
        $nama = 'Nafiar Rahmansyah';
        $id = DB::table('user')->insertGetId(
            ['username' => $username, 'password' => $password, 'role' => $role, 'nama' => $nama]
          );
        echo $id;
    }
}
