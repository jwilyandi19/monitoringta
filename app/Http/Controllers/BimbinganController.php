<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DosenPembimbing;
use App\TugasAkhir;
use App\Asistensi;
use App\Dosen;
use Redirect;
use App\BidangMK;
Use App\SeminarTA;
Use App\UjianTA;
use App\Jadwal;

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
        
        $data['bimbingans'] = TugasAkhir::where([['id_status', '>=', '0'], ['id_status', '<=', '5'], ['id_dosbing1', session('user')['id_dosen']]])->orWhere([['id_status', '>=', '0'], ['id_status', '<=', '5'], ['id_dosbing2', session('user')['id_dosen']]])->orderBy('created_at', 'desc')->with('user')->paginate(8);
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
        $detailta = TugasAkhir::where('id_ta',$id_ta)->with(['user','dosbing1','dosbing2','status','bidang',
            'seminarTA' => function($query){
                $query->with(['penguji1','penguji2','penguji3','penguji4','penguji5','jadwalSeminar']);
            },'ujianTA' => function($query){
                $query->with(['penguji1Ujian','penguji2Ujian','penguji3Ujian','penguji4Ujian','penguji5Ujian','jadwalUjian']);
            }])->first();
        //dd($detailta);
        if($detailta){
            $data['detailta'] = $detailta;
            $data['bidang_mks'] = BidangMK::all();
            $data['asistensis'] = Asistensi::where('id_ta',$detailta->id_ta)->with('dosen')->get();
            return view('bimbingan.detail_bimbingan',$data);
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
        
        $bimbingan = DosenPembimbing::where([['id_ta', '=', $request->idTugasAkhir],['id_dosen', '=', session('user')['id_dosen']]])->first();
        $bimbingan->status = 1;
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
        $asistensi->id_dosen = session('user')['id_dosen'];
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

    public function nilaiSeminar(Request $request)
    {
        //dd($request);
        $seminar = SeminarTA::where('id_seminar_ta',$request->id_seminar_ta)->first();
        //dd($seminar);
        $seminar->nilai = $request->nilai;
        $seminar->evaluasi = $request->evaluasi;
        if($seminar->save())
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->with('message', 'Berhasil Menginputkan Nilai Seminar');
        }
        else
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->withError('Terjadi Error Ketika Menginputkan Nilai Seminar');
        }
    }

    public function nilaiUjian(Request $request)
    {
        //dd($request);
        $ujian = UjianTA::where('id_ujian_ta',$request->id_ujian_ta)->first();
        $ujian->nilai_penguji1 = $request->nilai1;
        $ujian->nilai_penguji2 = $request->nilai2;
        $ujian->nilai_penguji3 = $request->nilai3;
        $ujian->nilai_penguji4 = $request->nilai4;
        $ujian->nilai_penguji5 = $request->nilai5;
        if($request->nilai5 != null)
        {
            $ujian->nilai_angka = ($request->nilai1 * 0.2) + ($request->nilai2 * 0.2) + ($request->nilai3 * 0.2) + ($request->nilai4 * 0.2) + ($request->nilai5 * 0.2);
        }
        else
        {
            $ujian->nilai_angka = ($request->nilai1 * 0.25) + ($request->nilai2 * 0.25) + ($request->nilai3 * 0.25) + ($request->nilai4 * 0.25);
        }
        if($ujian->nilai_angka>=88)
        {
            $ujian->nilai = 'A';
        }
        else if($ujian->nilai_angka>=80)
        {
            $ujian->nilai = 'AB';
        }
        else if($ujian->nilai_angka>=70)
        {
            $ujian->nilai = 'B';
        }
        else if($ujian->nilai_angka>=60)
        {
            $ujian->nilai = 'BC';
        }
        else if($ujian->nilai_angka>=50)
        {
            $ujian->nilai = 'C';
        }
        else
        {
            $ujian->nilai = 'E';
        }
        $ujian->evaluasi = $request->evaluasi;
        if($ujian->save())
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->with('message', 'Berhasil Menginputkan Nilai Ujian');
        }
        else
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->withError('Terjadi Error Ketika Menginputkan Nilai Ujian');
        }
    }

    public function mahasiswaUji(){
        $data['seminars'] = SeminarTA::where([['id_penguji3', '=',session('user')['id_dosen']],['status', '>=', 1]])->orWhere([['id_penguji4', '=',session('user')['id_dosen']],['status', '>=', 1]])->orWhere([['id_penguji5', '=',session('user')['id_dosen']],['status', '>=', 1]])->with('tugasAkhir.user')->paginate(8);
        $data['ujians'] = UjianTA::where([['id_penguji3', '=',session('user')['id_dosen']],['status', '>=', 1]])->orWhere([['id_penguji4', '=',session('user')['id_dosen']],['status', '>=', 1]])->orWhere([['id_penguji5', '=',session('user')['id_dosen']],['status', '>=', 1]])->with('tugasAkhir.user')->paginate(8);

        return view('bimbingan.uji', $data);
    }

    public function detailUji($id_ta){
        $detailta = TugasAkhir::where('id_ta',$id_ta)->with(['user','dosbing1','dosbing2','status','bidang',
            'seminarTA' => function($query){
                $query->with(['penguji1','penguji2','penguji3','penguji4','penguji5','jadwalSeminar']);
            },'ujianTA' => function($query){
                $query->with(['penguji1Ujian','penguji2Ujian','penguji3Ujian','penguji4Ujian','penguji5Ujian','jadwalUjian']);
            }])->first();
        //dd($detailta);
        if($detailta){
            $data['detailta'] = $detailta;
            $data['asistensis'] = Asistensi::where('id_ta',$detailta->id_ta)->with('dosen')->get();
            return view('bimbingan.detail_penguji',$data);
        }
        else
        {
            return view('home');
        }
    }

    public function ubahDetail(Request $request){
        //dd($request);
        $ta = TugasAkhir::where('id_ta', $request->id_ta)->first();
        $ta->judul = $request->judulTA;
        $ta->id_bidang_mk = $request->bidangMK;
        if($ta->save())
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->with('message', 'Berhasil Mengubah Data TA');
        }
        else
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->withError('Terjadi Error Ketika Menginputkan Data TA baru');
        }
    }
}
