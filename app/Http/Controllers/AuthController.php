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
use App\BidangMK;
use App\User;
use App\BidangDosen;

class AuthController extends Controller
{
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
            return Redirect::to('/')->withErrors($validator)->withInput();
        }
        else{
        	$username = $request->username;
        	$user = User::where('username', $username)->first();
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
    				return Redirect::to('/');
        		}
        		else{
        			return Redirect::to('/')->withErrors('Username atau Password yang dimasukkan Salah');
        		}
        	}
        	else{
        		return Redirect::to('/')->withErrors('Username atau Password yang dimasukkan Salah');
        	}
        }
    }

    public function logOut(Request $request){
        if(!session('user')){
            return redirect('/')->withErrors('Halaman Tidak Ditemukan');
        }
        else{
            $request->session()->flush();
            return Redirect::to('/');
        }
    }

    public function gantiPass(){
        if(!session('user')){
            return redirect('/')->withErrors('Halaman Tidak Ditemukan');
        }
        else{
            return view('gantipassword');
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

    public function dataDosen(){
        $data['dosen'] = Dosen::where('id_dosen', session('user')['id_dosen'])->with('bidangs.bidang')->first();
        $data['bidangs'] = BidangMK::all();
        //dd($data);
        return view('datadosen', $data);
    }

    public function tambahkanBidang(Request $request){
        $dosen = Dosen::where('id_dosen', session('user')['id_dosen'])->with('bidangs.bidang')->first();
        if($request->bidangMK){
            $flagAda = 0;
            if($dosen->bidangs){
                foreach ($dosen->bidangs as $key => $bidang) {
                    if($bidang->id_bidang_mk == $request->bidangMK){
                        $flagAda = 1;
                    }
                }
            }
            if($flagAda){
                return Redirect::to(url('/datadosen'))->withErrors('Gagal menambahkan bidang keahlian, karena bidang yang anda pilih sudah pernah ditambahkan');
            }
            else{
                $bidangDosen = new BidangDosen();
                $bidangDosen->id_dosen = session('user')['id_dosen'];
                $bidangDosen->id_bidang_mk = $request->bidangMK;
                if($bidangDosen->save()){
                    return Redirect::to('/datadosen');
                }
                else{
                    return Redirect::to('/datadosen')->withErrors('Gagal menyimpan data bidang, silahkan coba lagi');
                }
            }
        }
        else{
            return Redirect::to('/datadosen')->withErrors('Data bidang tidak boleh kosong');
        }

    }

    public function hapusBidang(Request $request){
        $bidang = BidangDosen::where([['id_dosen', '=',session('user')['id_dosen']],['id_bidang_mk', '=', $request->idBidangMK]])->first();
        if($bidang->delete()){
            return Redirect::to('/datadosen');
        }
        else{
            return Redirect::to('/datadosen')->withErrors('Gagal menghapus bidang keahlian, silahkan coba lagi');
        }
    }
}
