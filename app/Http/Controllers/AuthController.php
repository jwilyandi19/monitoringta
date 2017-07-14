<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;    
use Session;
use Uuid;
use Redirect;
use App\User;
use DB;

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
    				$dataUser = array('username' => $user->username, 'role' => $user->role, 'id' => $user->id_user);
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
        $request->session()->flush();
        return Redirect::to('/home')->with('message', 'Berhasil Logout');
    }

    public function gantiPass(){
        if(!session('user')){
            return view('home');
        }
        else{
            return view('gantipassword');
        }
    }
}
