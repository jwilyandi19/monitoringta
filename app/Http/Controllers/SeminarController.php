<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\JadwalSeminar;
use App\KetersediaanSeminar;

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
        $dosens = KetersediaanSeminar::with(['jadwalSeminar' => function($query) use ($tanggalTutup){
            $query->where('tanggal', '>', $tanggalTutup);
        }])->get();
        
        foreach ($dosens as $key => $dosen) {
            $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->sesi] = 1;
        }
        foreach ($jadwals as $key => $jadwal) {
            $jadwalSeminar[$jadwal->tanggal][$jadwal->sesi] = $jadwal->id_js;
        }

        $dates = array_keys($jadwalSeminar);
        //print_r($dates);
        foreach ($dates as $key => $date) {
            $tanggalSeminars[$key]['tanggal'] = $date;
            $day = date('D', strtotime($date));
            $tanggalSeminars[$key]['hari'] = $dayList[$day];
            $tanggalSeminars[$key]['sesi'] = $jadwalSeminar[$date];
        }
        $data['tanggalSeminars'] = $tanggalSeminars;
        $data['ketersediaanDosen'] = $ketersediaanDosen;

        /*foreach ($tanggalSeminars as $key => $tanggalSeminar) {
            //echo $tanggalSeminar['hari'].", ".$tanggalSeminar['tanggal']."\n";
            //print_r($tanggalSeminar['sesi']);
            foreach ($tanggalSeminar['sesi'] as $key => $sesi) {
                if(isset($ketersediaanDosen[$tanggalSeminar['tanggal']][$key]) && $ketersediaanDosen[$tanggalSeminar['tanggal']][$key] == 1){
                    echo $sesi.", ".$key."\n";
                }
            }
        }*/
        //dd($data);
        return view('seminar.ketersediaan', $data);
    }
}
