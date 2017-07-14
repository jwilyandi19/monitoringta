<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TugasAkhir;
use App\DosenPembimbing;
use App\Dosen;

class ProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::all();

        $taMahasiswas = TugasAkhir::where('id_user', session('user')['id'])->get();
        $statusTas = array();
        foreach ($taMahasiswas as $key => $taMahasiswa) {
            $statusTas[$key]['id_ta'] = $taMahasiswa->id_ta;
            $statusTas[$key]['tanggal'] = $taMahasiswa->tanggal;
            $statusTas[$key]['judul'] = $taMahasiswa->judul;
            $statusTas[$key]['pemb1'] = "-";
            $statusTas[$key]['pemb2'] = "-";
            $statusTas[$key]['status'] = $taMahasiswa->status()->keterangan;
         }
         dd($statusTas);

        //return view('statusta');
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
}
