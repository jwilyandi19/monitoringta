<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\JadwalSeminar;
use App\JadwalUjian;
use App\SeminarTA;
use App\KetersediaanSeminar;
use App\UjianTA;
use App\KetersediaanUjian;
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
        $ruang = $request->ruang;
        $jadwal1 = new JadwalSeminar();
        $jadwal2 = new JadwalSeminar();
        $jadwal3 = new JadwalSeminar();
        $jadwal1->tanggal = $tanggal;
        $jadwal2->tanggal = $tanggal;
        $jadwal3->tanggal = $tanggal;
        $jadwal1->sesi = 1;
        $jadwal2->sesi = 2;
        $jadwal3->sesi = 3;
        $jadwal1->ruang = $ruang;
        $jadwal2->ruang = $ruang;
        $jadwal3->ruang = $ruang;
        if($jadwal1->save() && $jadwal2->save() && $jadwal3->save()){
            return Redirect::to('/jadwalseminar')->with('message', 'Berhasil menambahkan jadwal seminar baru');
        }
        else{
            return Redirect::to('/jadwalseminar')->withError('Gagal menambahkan jadwal seminar baru');
        }
    }

    public function hapusJadwalSeminar(Request $request){
        $tanggal = $request->tanggalPilihan;
        $ruang = $request->ruang;
        $flag = 0;
        $jadwalSeminars = JadwalSeminar::select('id_js')->where([['tanggal',$tanggal],['ruang',$ruang]])->get();
        foreach($jadwalSeminars as $jadwalSeminar) {
            $seminar = SeminarTA::where('id_js',$jadwalSeminar->id_js)->get();
            if($seminar->first()) {
                $flag = 1;
                break;
            }
        }

        if($flag) {
            return Redirect::to('/jadwalseminar')->withErrors('Gagal menghapus jadwal seminar. Ada seminar dalam jadwal tersebut.');
        }
        else {
            foreach($jadwalSeminars as $jadwalSeminar) {
                $ketersediaanSeminar = KetersediaanSeminar::where('id_js',$jadwalSeminar->id_js)->delete();
            }
            $deleteTanggals = JadwalSeminar::where([['tanggal', $tanggal],['ruang',$ruang]])->delete();
            if($deleteTanggals){
                return Redirect::to('/jadwalseminar');
            }
            else{
                return Redirect::to('/jadwalseminar')->withErrors('Gagal menghapus jadwal seminar');
            }
        }
    }

    public function jadwalUjian(){
        $awalSemester = Jadwal::where('nama', 'Awal Semester')->first();
        $data['jadwal_ujians'] = JadwalUjian::where([['tanggal', '>', $awalSemester->tanggal],['sesi', '=', '1']])->paginate(10);
        return view('jadwal.ujian', $data);
    }

    public function tambahJadwalUjian(Request $request){
        $tanggal = $request->tanggal;
        $ruang = $request->ruang;
        $jadwal1 = new JadwalUjian();
        $jadwal2 = new JadwalUjian();
        $jadwal3 = new JadwalUjian();
        $jadwal1->tanggal = $tanggal;
        $jadwal2->tanggal = $tanggal;
        $jadwal3->tanggal = $tanggal;
        $jadwal1->sesi = 1;
        $jadwal2->sesi = 2;
        $jadwal3->sesi = 3;
        $jadwal1->ruang = $ruang;
        $jadwal2->ruang = $ruang;
        $jadwal3->ruang = $ruang;
        if($jadwal1->save() && $jadwal2->save() && $jadwal3->save()){
            return Redirect::to('/jadwalujian');
        }
        else{
            return Redirect::to('/jadwalujian')->withError('Gagal menambahkan jadwal sidang baru');
        }
    }

    public function hapusJadwalUjian(Request $request){
        $tanggal = $request->tanggalPilihan;
        $ruang = $request->ruang;
        $flag = 0;
        $jadwalUjians = JadwalUjian::select('id_ju')->where([['tanggal',$tanggal],['ruang',$ruang]])->get();
        foreach($jadwalUjians as $jadwalUjian) {
            $ujian = UjianTA::where('id_ju',$jadwalUjian->id_ju)->get();
            if($ujian->first()) {
                $flag = 1;
                break;
            }
        }

        if($flag) {
            return Redirect::to('/jadwalujian')->withErrors('Gagal menghapus jadwal ujian. Ada ujian dalam jadwal tersebut.');
        }
        else {
            foreach($jadwalUjians as $jadwalUjian) {
                $ketersediaanUjian = KetersediaanUjian::where('id_ju',$jadwalUjian->id_ju)->delete();
            }
            $deleteTanggals = JadwalUjian::where([['tanggal', $tanggal],['ruang',$ruang]])->delete();
            if($deleteTanggals){
                return Redirect::to('/jadwalujian');
            }
            else{
                return Redirect::to('/jadwalujian')->withErrors('Gagal menghapus jadwal ujian');
            }
        }
    }
}
