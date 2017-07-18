<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DosenPembimbing;
use App\TugasAkhir;
use App\Asistensi;
use App\BidangMK;
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
    public function edit($id_ta)
    {
        //dd($id_ta);
        $data['tugasAkhir'] = TugasAkhir::find($id_ta)->with(['dosbing1', 'dosbing2', 'bidang'])->first();
        $data['bidang_mks'] = BidangMK::all();
        $data['dosens'] = Dosen::all();
        //dd($data);
        return view('progres.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ta)
    {
        dd($request);
        $tugasAkhir = TugasAkhir::find($id_ta)->first();
        $tugasAkhir->judul = $request->judulTA;
        $tugasAkhir->id_bidang_mk = $request->bidangMK;
        if($tugasAkhir->id_dosbing1){
            if($request->pembimbing1){
                if($tugasAkhir->id_pembimbing1 != $request->pembimbing1){
                    $tugasAkhir->id_pembimbing1 = null;
                    $dosenPembimbing = DosenPembimbing::where([['id_ta', '=', $id_ta], ['peran', '=', '1']])->first();
                    $dosenPembimbing->id_dosen = $request->pembimbing1;
                    $dosenPembimbing->status = 0;
                    $dosenPembimbing->save();
                }
            }
            else{
                $tugasAkhir->id_dosbing1 = null;
                $dosenPembimbing = DosenPembimbing::where([['id_ta', '=', $id_ta], ['peran', '=', '1']])->first();
                $dosenPembimbing->delete();
            }
        }
        else{
            if($request->pembimbing1){
                $dosenPembimbing = DosenPembimbing::where([['id_ta', '=', $id_ta], ['peran', '=', '1']])->first();
                if($dosenPembimbing){
                    $dosenPembimbing->id_dosen = $request->pembimbing1;
                    $dosenPembimbing->status = 0;
                    $dosenPembimbing->save();
                }
                else{
                    $dosenPembimbing = new DosenPembimbing();
                    $dosenPembimbing->id_ta = $id_ta;
                    $dosenPembimbing->id_dosen = $request-pembimbing1;
                    $dosenPembimbing->status = 0;
                    $dosenPembimbing->save();
                }
            }
        }

        if($tugasAkhir->id_dosbing2){
            if($request->pembimbing2){
                if($tugasAkhir->id_pembimbing2 != $request->pembimbing2){
                    $tugasAkhir->id_pembimbing2 = null;
                    $dosenPembimbing = DosenPembimbing::where([['id_ta', '=', $id_ta], ['peran', '=', '2']])->first();
                    $dosenPembimbing->id_dosen = $request->pembimbing2;
                    $dosenPembimbing->status = 0;
                    $dosenPembimbing->save();
                }
            }
            else{
                $tugasAkhir->id_dosbing2 = null;
                $dosenPembimbing = DosenPembimbing::where([['id_ta', '=', $id_ta], ['peran', '=', '2']])->first();
                $dosenPembimbing->delete();
            }
        }
        else{
            if($request->pembimbing2){
                $dosenPembimbing = DosenPembimbing::where([['id_ta', '=', $id_ta], ['peran', '=', '2']])->first();
                if($dosenPembimbing){
                    $dosenPembimbing->id_dosen = $request->pembimbing2;
                    $dosenPembimbing->status = 0;
                    $dosenPembimbing->save();
                }
                else{
                    $dosenPembimbing = new DosenPembimbing();
                    $dosenPembimbing->id_ta = $id_ta;
                    $dosenPembimbing->id_dosen = $request-pembimbing2;
                    $dosenPembimbing->status = 0;
                    $dosenPembimbing->save();
                }
            }
        }

        if($tugasAkhir->save()){
            $url = url('/progres')."/".$id_ta;
            return Redirect::to($url)->with('message', 'Perubahan data Tugas Akhir anda berhasil disimpan');
        }
        else{
            $url = url('/progres')."/".$id_ta;
            return Redirect::to($url)->withErrors('Perubahan data Tugas Akhir anda gagal disimpan');
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
