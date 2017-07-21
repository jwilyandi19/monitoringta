<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KetersediaanUjian;
use App\JadwalUjian;
use App\Jadwal;
use Redirect;

class SidangController extends Controller
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

    public function ketersediaanUjian(){
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
        $jadwalUjian = array();
        $tanggalUjians = array();
        
        $tanggalTutup = Jadwal::where('nama', 'Tutup Ketersediaan Ujian')->first()->tanggal;
        $jadwals = JadwalUjian::where('tanggal', '>', $tanggalTutup)->orderBy('tanggal')->get();
        $dosens = KetersediaanUjian::where('id_dosen', session('user')['id_dosen'])->with(['jadwalUjian' => function($query) use ($tanggalTutup){
            $query->where('tanggal', '>', $tanggalTutup);
        }])->get();
        
        foreach ($dosens as $key => $dosen) {
            $ketersediaanDosen[$dosen->jadwalUjian->tanggal][$dosen->jadwalUjian->sesi] = 1;
        }
        foreach ($jadwals as $key => $jadwal) {
            $jadwalUjian[$jadwal->tanggal][$jadwal->sesi] = $jadwal->id_ju;
        }

        $dates = array_keys($jadwalUjian);
        foreach ($dates as $key => $date) {
            $tanggalUjians[$key]['tanggal'] = $date;
            $day = date('D', strtotime($date));
            $tanggalUjians[$key]['hari'] = $dayList[$day];
            $tanggalUjians[$key]['sesi'] = $jadwalUjian[$date];
        }
        $data['tanggalUjians'] = $tanggalUjians;
        $data['ketersediaanDosen'] = $ketersediaanDosen;

        return view('sidang.ketersediaan', $data);
    }

    public function mengisiKetersediaan(Request $request){
        $ketersediaan = new KetersediaanUjian();
        $ketersediaan->id_dosen = session('user')['id_dosen'];
        $ketersediaan->id_ju = $request->idJadwalUjian;
        $ketersediaan->save();

        return Redirect::to('/ketersediaanujian');
    }

    public function batalkanKetersediaan(Request $request){
        $ketersediaan = KetersediaanUjian::where([['id_dosen', '=', session('user')['id_dosen']],['id_ju', '=', $request->idJadwalUjian]])->delete();
        return Redirect::to('/ketersediaanujian');
    }
}
