<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\JadwalSeminar;
use App\KetersediaanSeminar;
use Redirect;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\u
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

    public function ketersediaanSeminar(){
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $ketersediaanDosen = array();
        $jadwalSeminar = array();
        $tanggalSeminars = array();
        
        $tanggalTutup = Jadwal::where('nama', 'Tutup Ketersediaan Seminar')->first()->tanggal;
        $jadwals = JadwalSeminar::where('tanggal', '>', $tanggalTutup)->orderBy('tanggal')->get();
        $dosens = KetersediaanSeminar::where('id_dosen', session('user')['id_dosen'])->with(['jadwalSeminar' => function($query) use ($tanggalTutup){
            $query->where('tanggal', '>', $tanggalTutup);
        }])->get();
        
        foreach ($dosens as $key => $dosen) {
            $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->sesi] = 1;
        }
        foreach ($jadwals as $key => $jadwal) {
            $jadwalSeminar[$jadwal->tanggal][$jadwal->sesi] = $jadwal->id_js;
        }

        $dates = array_keys($jadwalSeminar);
        foreach ($dates as $key => $date) {
            $tanggalSeminars[$key]['tanggal'] = $date;
            $day = date('D', strtotime($date));
            $tanggalSeminars[$key]['hari'] = $dayList[$day];
            $tanggalSeminars[$key]['sesi'] = $jadwalSeminar[$date];
        }
        $data['tanggalSeminars'] = $tanggalSeminars;
        $data['ketersediaanDosen'] = $ketersediaanDosen;

        return view('seminar.ketersediaan', $data);
    }

    public function mengisiKetersediaan(Request $request){
        $ketersediaan = new KetersediaanSeminar();
        $ketersediaan->id_dosen = session('user')['id_dosen'];
        $ketersediaan->id_js = $request->idJadwalSeminar;
        $ketersediaan->save();

        return Redirect::to('/ketersediaanseminar');
    }

    public function batalkanKetersediaan(Request $request){
        $ketersediaan = KetersediaanSeminar::where([['id_dosen', '=', session('user')['id_dosen']],['id_js', '=', $request->idJadwalSeminar]])->delete();
        return Redirect::to('/ketersediaanseminar');
    }

    public function pengajuanJadwal(){
        $tugasAkhir = TugasAkhir::where([['id_user', $session('user')['id']],['status', '>=', '0']])->first();
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $ketersediaanDosen = array();
        $jadwalSeminar = array();
        $tanggalSeminars = array();
        
        $tanggalTutup = Jadwal::where('nama', 'Tutup Ketersediaan Seminar')->first()->tanggal;
        $jadwals = JadwalSeminar::where('tanggal', '>', $tanggalTutup)->orderBy('tanggal')->get();
        if($tugasAkhir->id_dosbing1 && $tugasAkhir->id_dosbing2){
            $dosens = KetersediaanSeminar::where('id_dosen', $tugasAkhir->id_dosbing1)->orWhere('id_dosen', $tugasAkhir->id_dosbing2)->with(['jadwalSeminar' => function($query) use ($tanggalTutup){
                $query->where('tanggal', '>', $tanggalTutup);
            }])->get();
        }
        elseif(!$tugasAkhir->id_dosbing2 || !$tugasAkhir->id_dosbing1){
            if($tugasAkhir->id_dosbing1){
                $dosens = KetersediaanSeminar::where('id_dosen', $tugasAkhir->id_dosbing1)->with(['jadwalSeminar' => function($query) use ($tanggalTutup){
                    $query->where('tanggal', '>', $tanggalTutup);
                }])->get();
            }
            else{
                $dosens = KetersediaanSeminar::where('id_dosen', $tugasAkhir->id_dosbing2)->with(['jadwalSeminar' => function($query) use ($tanggalTutup){
                    $query->where('tanggal', '>', $tanggalTutup);
                }])->get();
            }
        }
        else{
            return Redirect::to('/home')->withError('Tidak dapat mengajukan jadwal semminar karena anda tidak memiliki dosen pembimbing');
        }
        
        $dosens = KetersediaanSeminar::where('id_dosen', session('user')['id_dosen'])->with(['jadwalSeminar' => function($query) use ($tanggalTutup){
            $query->where('tanggal', '>', $tanggalTutup);
        }])->get();
        
        foreach ($dosens as $key => $dosen) {
            //if($tugasAkhir->)
            $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->sesi] = 1;
        }
        foreach ($jadwals as $key => $jadwal) {
            $jadwalSeminar[$jadwal->tanggal][$jadwal->sesi] = $jadwal->id_js;
        }

        $dates = array_keys($jadwalSeminar);
        foreach ($dates as $key => $date) {
            $tanggalSeminars[$key]['tanggal'] = $date;
            $day = date('D', strtotime($date));
            $tanggalSeminars[$key]['hari'] = $dayList[$day];
            $tanggalSeminars[$key]['sesi'] = $jadwalSeminar[$date];
        }
        $data['tanggalSeminars'] = $tanggalSeminars;
        $data['ketersediaanDosen'] = $ketersediaanDosen;

        return view('seminar.ketersediaan', $data);
    }
}
