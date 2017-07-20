<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\JadwalSeminar;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jadwals'] = Jadwal::all();
        return view('jadwal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal.create');
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
        $data['jadwal'] = Jadwal::where('id_jadwal', $id)->first();
        return view('jadwal.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['jadwal'] = Jadwal::where('id_jadwal', $id)->first();
        return view('jadwal.edit', $data);
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

    public function jadwalSeminar(){
        $tanggalTutup = Jadwal::where('nama', 'Tutup Ketersediaan Seminar')->first();
        //dd($tanggalTutup);
        $data['jadwal_seminars'] = JadwalSeminar::where([['tanggal', '>', $tanggalTutup->tanggal],['sesi', '=', '1']])->paginate(10);
        //dd($data);
        return view('jadwal.seminar', $data);
    }   

    public function tambahJadwalSeminar($id){
        return view('jadwal.seminar');
    }

    public function jadwalUjian(){
        return view('jadwal.ujian');
    }

    public function tambahJadwalUjian($id){
        return view('jadwal.ujian');
    }
}
