<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\JadwalSeminar;
use App\JadwalUjian;
use Redirect;

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
        $jadwal = Jadwal::where('id_jadwal', $id)->first();
        $jadwal->tanggal = $request->tanggal;
        if($jadwal->save()){
            return Redirect::to('/jadwal');
        }
        else{
            return Redirect::to('/jawdal/'.$id.'/edit')->withError('Gagal Mengubah Jadwal');
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

    public function jadwalSeminar(){
        $awalSemester = Jadwal::where('nama', 'Awal Semester')->first();
        $data['jadwal_seminars'] = JadwalSeminar::where([['tanggal', '>', $awalSemester->tanggal],['sesi', '=', '1']])->paginate(10);
        return view('jadwal.seminar', $data);
    }   

    public function tambahJadwalSeminar(Request $request){
        $tanggal = $request->tanggal;
        $jadwal1 = new JadwalSeminar();
        $jadwal2 = new JadwalSeminar();
        $jadwal3 = new JadwalSeminar();
        $jadwal1->tanggal = $tanggal;
        $jadwal2->tanggal = $tanggal;
        $jadwal3->tanggal = $tanggal;
        $jadwal1->sesi = 1;
        $jadwal2->sesi = 2;
        $jadwal3->sesi = 3;
        if($jadwal1->save() && $jadwal2->save() && $jadwal3->save()){
            return Redirect::to('/jadwalseminar')->with('message', 'Berhasil menambahkan jadwal seminar baru');
        }
        else{
            return Redirect::to('/jadwalseminar')->withError('Gagal menambahkan jadwal seminar baru');
        }
    }

    public function hapusJadwalSeminar(Request $request){
        $tanggal = $request->tanggalPilihan;
        $deleteTanggals = JadwalSeminar::where('tanggal', $tanggal)->delete();
        if($deleteTanggals){
            return Redirect::to('/jadwalseminar');
        }
        else{
            return Redirect::to('/jadwalseminar')->withError('Gagal menghapus jadwal seminar');
        }
    }

    public function jadwalUjian(){
        $awalSemester = Jadwal::where('nama', 'Awal Semester')->first();
        $data['jadwal_ujians'] = JadwalUjian::where([['tanggal', '>', $awalSemester->tanggal],['sesi', '=', '1']])->paginate(10);
        return view('jadwal.ujian', $data);
    }

    public function tambahJadwalUjian(Request $request){
        $tanggal = $request->tanggal;
        $jadwal1 = new JadwalUjian();
        $jadwal2 = new JadwalUjian();
        $jadwal3 = new JadwalUjian();
        $jadwal1->tanggal = $tanggal;
        $jadwal2->tanggal = $tanggal;
        $jadwal3->tanggal = $tanggal;
        $jadwal1->sesi = 1;
        $jadwal2->sesi = 2;
        $jadwal3->sesi = 3;
        if($jadwal1->save() && $jadwal2->save() && $jadwal3->save()){
            return Redirect::to('/jadwalujian');
        }
        else{
            return Redirect::to('/jadwalujian')->withError('Gagal menambahkan jadwal seminar baru');
        }
    }

    public function hapusJadwalUjian(Request $request){
        $tanggal = $request->tanggalPilihan;
        $deleteTanggals = JadwalUjian::where('tanggal', $tanggal)->delete();
        if($deleteTanggals){
            return Redirect::to('/jadwalujian');
        }
        else{
            return Redirect::to('/jadwalujian')->withError('Gagal menghapus jadwal seminar');
        }
    }
}
