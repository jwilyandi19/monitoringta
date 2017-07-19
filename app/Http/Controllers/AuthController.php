<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;
use Monolog\Handler\SyslogUdp\UdpSocket;
use Session;
use Uuid;
use DB;
use Redirect;
use App\Dosen;
use App\User;

class AuthController extends Controller
{
    public function logIn(){
        if(!session('user')['username']){
            return view('home');
        }
        else{
            return Redirect::to('home');
        }
    }

    public function doLogin(Request $request){
    	$messagesError = [ 
            'username.required' => 'Username tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
            ];

        $validator = Validator::make($request->all(), [ 
                'username' => 'required',
                'password' => 'required',    
            ], $messagesError);

        if($validator->fails()) 
        { 
            return Redirect::to('/home')->withErrors($validator)->withInput();
        }
        else{
        	$username = $request->username;
        	$user = DB::table('user')->where('username', $username)->first();
        	if($user){
        		if(Hash::check($request->password, $user->password)){
    				if($user->role == 2){
                        $dosen = Dosen::where('id_user', $user->id_user)->first();
                        $dataUser = array('username' => $user->username, 'role' => $user->role, 'id' => $user->id_user, 'id_dosen' => $dosen->id_dosen);
                    }
                    else{
                        $dataUser = array('username' => $user->username, 'role' => $user->role, 'id' => $user->id_user);
                    }
    				$request->session()->put('user', $dataUser);
    				return Redirect::to('home');
        		}
        		else{
        			return Redirect::to('home')->withErrors('Username atau Password yang dimasukkan Salah');
        		}
        	}
        	else{
        		return Redirect::to('home')->withErrors('Username atau Password yang dimasukkan Salah');
        	}
        }
    }

    public function logOut(Request $request){
        if(!session('user')){
            return redirect('/home')->withErrors('Halaman Tidak Ditemukan');
        }
        else{
            $request->session()->flush();
            return Redirect::to('/home')->with('message', 'Berhasil Logout');
        }
    }

    public function gantiPass(){
        if(!session('user')){
            return redirect('/home')->withErrors('Halaman Tidak Ditemukan');
        }
        else{
            return view('/gantipassword');
        }
    }

    public function buatUser(){
        $user = new User();
        $user->username = 'raf';
        $user->password = bcrypt('raf');
        $user->role = 3;
        $user->nama = 'rafiar';
        $user->save();
    }

    public function gantiPassword(Request $request){
        $messagesError = [
            'passwordLama.required' => 'Password Lama tidak boleh kosong.',
            'passwordBaru.required' => 'Password Baru tidak boleh kosong.',
            'konfirmasiPassword.required' => 'Konfirmasi Password tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), [
            'passwordLama' => 'required',
            'passwordBaru' => 'required',
            'konfirmasiPassword' => 'required',
        ], $messagesError);

        if($validator->fails())
        {
            return Redirect::to('/gantipassword')->withErrors($validator)->withInput();
        }
        else
        {
            $user = User::where('id_user',session('user')['id'])->first();
            if(Hash::check($request->passwordLama, $user->password))
            {
                $hashPswdBaru = bcrypt($request->passwordBaru);
                if(Hash::check($request->konfirmasiPassword, $hashPswdBaru))
                {
                    $user->password = $hashPswdBaru;
                    if($user->save())
                    {
                        return Redirect::to('gantipassword')->with('message','Berhasil Mengganti Password');
                    }
                    else
                    {
                        return Redirect::to('gantipassword')->withErrors('Gagal menyimpan data!');
                    }
                }
                else
                {
                    return Redirect::to('gantipassword')->withErrors('Password Baru dan Konfirmasi Password TIdak sesuai!');
                }
            }
            else
            {
                return Redirect::to('gantipassword')->withErrors('Password Lama Salah!');
            }
        }
    }

    public function buatUser1(Request $request)
    {
        $messagesError = [
            'username.required' => 'Username tidak boleh kosong.',
            'role.required' => 'Peran tidak boleh kosong.',
            'nama.required' => 'Nama tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'role' => 'required',
            'nama' => 'required',
        ], $messagesError);

        if($validator->fails())
        {
            return Redirect::to('/buatuser')->withErrors($validator)->withInput();
        }
        else
        {
            $user = User::where('username','=',$request->username);
            if($user)
            {
                return Redirect::to('/buatuser')->withErrors('User dengan Username '.$request->username.' Sudah ada');
            }
            else
            {
                $baru = new User();
                $baru->username = $request->username;
                $baru->password = bcrypt($request->username);
                $baru->role = $request->role;
                $baru->nama = $request->nama;
                if($baru->save())
                {
                    return Redirect::to('/buatuser')->with('message','Berhasil Membuat User '.$request->username);
                }
                else
                {
                    return Redirect::to('/buatuser')->withErrors('Terdapat kesalahan pada server ketika membuat User '.$request->username);
                }
            }
        }
    }
}
