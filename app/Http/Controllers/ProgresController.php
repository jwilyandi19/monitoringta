<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TugasAkhir;
use App\Asistensi;

class ProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tugasAkhirs'] = TugasAkhir::where('id_user', session('user')['id'])->orderBy('id_ta', 'desc')->with(['dosbing1', 'dosbing2', 'status'])->get();
        //dd($data);
        return view('progres.status', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail()
    {
        $detailta = TugasAkhir::where([['id_user', '=', session('user')['id']],['id_status','>=','0']])->with(['user','dosbing1','dosbing2','status','bidang'])->first();
        if($detailta){
            $data['detailta'] = $detailta;
            $data['asistensis'] = Asistensi::where('id_ta',$detailta->id_ta)->get();
            return view('progres.detail',$data);
        }
        else
        {
            return view('home');
        }
    }
}
