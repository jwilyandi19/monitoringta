<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\DosenPembimbing;
use App\TugasAkhir;
use Redirect;
use App\Asistensi;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['konfirmasis'] = DosenPembimbing::where([ 
            ['id_dosen', '=', session('user')['id_dosen']], 
            ['status', '=', '0']])->orderBy('created_at')->with(['tugasAkhir' => function($query){
                $query->where('id_status','>=','0')->with('user');
            }])->get();
        
        $data['bimbingans'] = TugasAkhir::where([['id_status', '>=', '0'], ['id_dosbing1', session('user')['id_dosen']]])->orWhere([['id_status', '>=', '0'], ['id_dosbing2', session('user')['id_dosen']]])->orderBy('tanggalBuat', 'desc')->with('user')->paginate(8);
        //dd($data);
        return view('bimbingan.index', $data);
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
    public function show($id_ta)
    {
        $detailta = TugasAkhir::where('id_ta',$id_ta)->with(['user','dosbing1','dosbing2','status','bidang'])->first();
        if($detailta){
            $data['detailta'] = $detailta;
            $data['asistensis'] = Asistensi::where('id_ta',$detailta->id_ta)->get();
            //dd($data);
            return view('progres.detail_dosbing',$data);
        }
        else
        {
            return view('home');
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

    public function konfirmasiTA(Request $request){
        //dd($request);
        $bimbingan = DosenPembimbing::where([['id_ta', '=', $request->idTugasAkhir],['id_dosen', '=', session('user')['id_dosen']]])->first();
        //dd($bimbingan);
        $bimbingan->status = 1;
        //dd($bimbingan); 
        if($bimbingan->save()){
            $tugasAkhir = TugasAkhir::where('id_ta', $bimbingan->id_ta)->first();
            if($bimbingan->peran == 1){
                $tugasAkhir->id_dosbing1 = session('user')['id_dosen'];   
            }
            elseif($bimbingan->peran == 2){
                $tugasAkhir->id_dosbing2 = session('user')['id_dosen'];
            }
            
            if($tugasAkhir->save()){
                return Redirect::to('/bimbingan')->with('message', 'Konfirmasi penerimaan bimbingan berhasil dilakukan');
            }
        }
        else{
            return Redirect::to('/bimbingan')->withError('Konfirmasi penerimaan bimbingan gagal dilakukan');
        }
    }

    public function tolakTA(Request $request){
        //dd($request);
        $bimbingan = DosenPembimbing::where([['id_ta', '=', $request->idTugasAkhir],['id_dosen', '=', session('user')['id_dosen']]])->first();
        if($bimbingan->delete()){
            return Redirect::to('/bimbingan')->with('message', 'Berhasil menolak permintaan bimbingan');
        }
        else{
            return Redirect::to('/bimbingan')->withError('Menolak penerimaan bimbingan gagal dilakukan');
        }
    }

    public function asistensi(Request $request)
    {
        $asistensi = new Asistensi();
        $asistensi->id_ta = $request->id_ta;
        $asistensi->tanggal = $request->tanggal;
        $asistensi->materi = $request->materi;
        if($asistensi->save())
        {
            $ta = (string)$request->id_ta;
            $url = url('/bimbingan')."/".$ta;
            return Redirect::to($url)->with('message', 'Berhasil Menambahkan data asistensi');
        }
        else
        {
            return Redirect::to('/bimbingan')->withError('Gagal Mengisi Asistensi');
        }
    }
}
