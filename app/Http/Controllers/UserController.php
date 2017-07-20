<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['users'] = User::orderBy('id_user','dsc')->get();
        return view('user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return Redirect::to('/user/create')->withErrors($validator)->withInput();
        }
        else
        {
            $user = User::where('username','=',$request->username)->first();
           // dd($user);
            if($user!=null)
            {
                return Redirect::to('/user/create')->withErrors('User dengan Username '.$request->username.' Sudah ada');
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
                    return Redirect::to('/user/create')->with('message','Berhasil Membuat User '.$request->username);
                }
                else
                {
                    return Redirect::to('/user/create')->withErrors('Terdapat kesalahan pada server ketika membuat User '.$request->username);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id_user',$id)->first();
        //dd($user);
        if($user!=null)
        {
            if($user->role == 2)
            {
                $data['user'] = User::where('id_user',$id)->with('akunDosen')->first();
            }
            else
            {
                $data['user'] = $user;
            }
            //dd($data);
            return view('user.show',$data);
        }
        else
        {
            return Redirect::to('/user')->withErrors('User Tidak Ditemukan');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id_user',$id)->first();
        $data['user'] = $user;
        return
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        if(User::where('id_user',$id)->delete())
        {
            return Redirect::to('/user')->with('message','Berhasil Menghapus user '.$id);
        }
        else
        {
            return Redirect::to('/user')->withErrors('User Tidak Ditemukan');
        }
    }
}
