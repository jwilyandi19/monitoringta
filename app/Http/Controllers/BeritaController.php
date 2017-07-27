<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Validator;
use App\Berita;
use Symfony\Component\Yaml\Tests\B;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['beritas'] = Berita::orderBy('created_at','desc')->with(['uploader'])->get();
        //dd($data);
        return view('berita.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(Session('user'));
        return view('berita.create');
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
            'judul.required' => 'Judul tidak boleh kosong.',
            'isi.required' => 'Isi tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
        ], $messagesError);

        if($validator->fails())
        {
            return Redirect::to('/home/create')->withErrors($validator)->withInput();
        }
        else
        {
            $berita = new Berita();
            $berita->judul_berita = $request->judul;
            $berita->isi_berita = $request->isi;
            $berita->id_user = $request->id_user;
            if($berita->save())
            {
                return Redirect::to('/home/create')->with('message','Berhasil menambahkan berita '.$request->judul);
            }
            else
            {
                return Redirect::to('/home/create')->withErrors('Gagal membuat Berita '.$request->judul);
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
        $data['berita'] = Berita::where('id_berita',$id)->first();
        return view('berita.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['berita'] = Berita::where('id_berita',$id)->first();
        if($data != null)
        {
            return view('berita.edit',$data);
        }
        else
        {
            return view('berita.index')->withErrors('Berita Tidak ditemukan');
        }

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
        $berita = Berita::where('id_berita',$id)->first();
        if($berita!=null)
        {
            $berita->id_user = $request->id_user;
            $berita->judul_berita = $request->judul;
            $berita->isi_berita = $request->isi;
            if($berita->save())
            {
                return Redirect::to('/home')->with('message','Berhasil mengubah berita');
            }
            else
            {
                return Redirect::to('/home')->withErrors('Gagal ketika menyimpan data');
            }
        }
        else
        {
            return Redirect::to('/home')->withErrors('Berita tidak dapat ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::where('id_berita',$id)->first();
        if($berita!= null)
        {
            if($berita->delete())
            {
                return Redirect::to('/home')->with('message', 'Berhasil Menghapus berita');
            }
            else
            {
                return Redirect::to('/home')->withErrors('Terdapat Error pada server ketika menghapus');
            }
        }
        else
        {
            return Redirect::to('/home')->withErrors('Berita tidak ditemukan');
        }
    }
}
