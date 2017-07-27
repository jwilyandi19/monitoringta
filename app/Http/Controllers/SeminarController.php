<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\JadwalSeminar;
use App\KetersediaanSeminar;
use App\TugasAkhir;
use App\SeminarTA;
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
        //$seminarTAs = SeminarTA::where('status' = 1)->with(['','penguji1', 'penguji2'])
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
        $jumlahJadwal = count($jadwals);
        
        if($jumlahJadwal == 0){
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena jadwal seminar belum disediakan');
        }
        else{
            foreach ($jadwals as $key => $jadwal) {
                $jadwalSeminar[$jadwal->tanggal][$jadwal->sesi] = $jadwal->id_js;
            }

            $dosens = KetersediaanSeminar::where('id_dosen', session('user')['id_dosen'])->with(['jadwalSeminar' => function($query) use ($tanggalTutup){
                $query->where('tanggal', '>', $tanggalTutup);
            }])->get();
            
            foreach ($dosens as $key => $dosen) {
                if($dosen->jadwalSeminar){
                    $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->sesi] = 1;
                }
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
        $tugasAkhir = TugasAkhir::where([['id_user', session('user')['id']],['id_status', '>=', '0']])->first();
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        
        $seminarTA = SeminarTA::where('id_ta', $tugasAkhir->id_ta)->first();
        if($seminarTA){
            $jadwalTerdaftar = JadwalSeminar::where('id_js', $seminarTA->id_js)->first();
            $data['seminars'] = SeminarTA::where([['id_js', '=',$seminarTA->id_js], ['status', '=', '0']])->with('tugasAkhir.user')->orderBy('created_at')->get();
            $day = date('D', strtotime($jadwalTerdaftar->tanggal));
            $data['hari'] = $dayList[$day];
            $data['jadwalTerdaftar'] = $jadwalTerdaftar;
        }
        $data['seminarTA'] = $seminarTA;

        $ketersediaanDosen = array();
        $jadwalSeminar = array();
        $tanggalSeminars = array();
        
        $tanggalTutup = Jadwal::where('nama', 'Tutup Ketersediaan Seminar')->first()->tanggal;
        $jadwals = JadwalSeminar::where('tanggal', '>', $tanggalTutup)->orderBy('tanggal')->get();
        $jumlahJadwal = count($jadwals);
        if($jumlahJadwal == 0){
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena jadwal seminar belum disediakan');
        }
        else{
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
                return Redirect::to('/error')->with('message', 'Tidak dapat mengajukan jadwal semminar karena anda tidak memiliki dosen pembimbing');
            }
            
            //dd($dosens);
            foreach ($dosens as $key => $dosen) {
                if($dosen->jadwalSeminar){
                    if($dosen->id_dosen == $tugasAkhir->id_dosbing1){
                        $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->sesi][1] = 1;
                    }
                    else if($dosen->id_dosen == $tugasAkhir->id_dosbing2){
                        $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->sesi][2] = 1;
                    }
                }
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

            return view('seminar.pengajuan', $data);
        }

    }

    public function formPengajuan($id){
        $tugasAkhir = TugasAkhir::where([['id_user', session('user')['id']],['id_status', '>=', '0']])->first();
        $seminarTA = SeminarTA::where('id_ta', $tugasAkhir->id_ta)->first();
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $jadwal = JadwalSeminar::where('id_js', $id)->first();
        $day = date('D', strtotime($jadwal->tanggal));
        $data['seminarTA'] = $seminarTA;
        $data['seminars'] = SeminarTA::where([['id_js', '=',$id], ['status', '=', '0']])->with('tugasAkhir.user')->orderBy('created_at')->get();
        $data['hari'] = $dayList[$day];
        $data['jadwal'] = $jadwal;
        return view('seminar.formpengajuan', $data);
    }

    public function doPengajuan(Request $request){
        $tugasAkhir = TugasAkhir::where([['id_user', session('user')['id']],['id_status', '>=', '0']])->first();
        $seminarTA = new SeminarTA();
        $seminarTA->id_ta = $tugasAkhir->id_ta;
        $seminarTA->id_js = $request->idJadwal;
        $seminarTA->status = 0;
        if($seminarTA->save()){
            return Redirect::to(url('/pengajuanseminar'))->with('message', 'Berhasil menyimpan data pengajuan jadwal seminar');
        }
        else{
            return Redirect::to(url('/formpengajuanseminar'.$request->idJadwal))->withError('Gagal menyimpan data pengajuan silahkan coba lagi');
        }
    }

    public function pembatalanJadwal(Request $request){
        //dd($request);
        $seminarTA = SeminarTA::where('id_seminar_ta', $request->idSeminar)->first();
        if($seminarTA->delete()){
            return Redirect::to(url('/pengajuanseminar'))->with('message', 'Berhasil membatalkan pengajuan TA');
        }
        else{
            return Redirect::to(url('/pengajuanseminar'))->withError('Gagal membatalkan pengajuan TA, silahkan coba lagi');
        }
    }
}
