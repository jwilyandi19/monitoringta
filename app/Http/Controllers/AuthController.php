<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;    
use Session;
use Uuid;
use Redirect;
use App\User;

class AuthController extends Controller
{
    public function doLogin(Request $request){
    	//dd($request);
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
            return Redirect::to('home')->withErrors($validator)->withInput();
        }
        else{
        	$username = $request->username;
        	$user = User::where('user_username', $username)->first();
        	if($user){
        		if(Hash::check($request->password, $user->user_password)){
    				//$dataUkm = Ukm::where('id_ukm', $user->id_ukm_user)->first();
    				//$dataUser = array('username' => $user->user_username, 'nama' => $user->user_name, 'role' => $user->user_role);
    				//$request->session()->put('user', $dataUser);
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
}
