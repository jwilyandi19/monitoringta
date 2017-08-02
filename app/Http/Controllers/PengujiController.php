<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Jadwal;
use App\Dosen;
use App\KetersediaanSeminar;
use App\KetersediaanUjian;
use App\JadwalSeminar;
use App\JadwalUjian;
use App\SeminarTA;
use App\UjianTA;

class PengujiController extends Controller
{
    public function pengujiSeminar(){
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
        
        $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
        $jadwals = JadwalSeminar::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->get();
        $jumlahJadwal = count($jadwals);
        if($jumlahJadwal == 0){
        	return Redirect::to('/error')->with('message', 'Halaman tidak ditemukan, tidak ada tanggal seminar yang sedang aktif saat ini');
        }
        else{
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
            
            return view('penguji.pengujiseminar', $data);
        }
    }

    public function formSeminar($id){
    	$tanggal = Jadwal::where('nama', 'Tutup Ketersediaan Seminar')->first()->tanggal;
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

        $ketersediaanSeminars = KetersediaanSeminar::where('id_js', $id)->with([
            'dosen' => function($query){
                $query->with([
                    'penguji1s' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji2s' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji3s' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji4s' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji5s' => function($query){
                        $query->where('status', '=', 1);
                    },'bidangs.bidang'
                ]);
            }
        ])->get();
        //dd($ketersediaanSeminars);
        $dosenBersedia = array();
        foreach ($ketersediaanSeminars as $key => $ketersediaanSeminar) {
            $dosenBersedia[$key]['nama_lengkap'] = $ketersediaanSeminar->dosen->nama_lengkap;
            $dosenBersedia[$key]['nama'] = $ketersediaanSeminar->dosen->nama;
            $string = "";
            
            if(count($ketersediaanSeminar->dosen->bidangs) != 0){
                $string = "";
                foreach ($ketersediaanSeminar->dosen->bidangs as $keys => $bidang) {
                    if($keys<1){
                        $string = $bidang->bidang->nama_bidang;
                    }
                    else{
                        $string = $string.", ".$bidang->bidang->nama_bidang;
                    }
                }
            }
            else{
                $string="tidak memiliki bidang";
            }
            $dosenBersedia[$key]['bidang'] = $string;
            $penguji1 = count($ketersediaanSeminar->dosen->penguji1s);
            $penguji2 = count($ketersediaanSeminar->dosen->penguji2s);
            $penguji3 = count($ketersediaanSeminar->dosen->penguji3s);
            $penguji4 = count($ketersediaanSeminar->dosen->penguji4s);
            $penguji5 = count($ketersediaanSeminar->dosen->penguji5s);
            $jumlahMenguji = $penguji1 + $penguji2 + $penguji3 + $penguji4 + $penguji5;
            $dosenBersedia[$key]['menguji'] = $jumlahMenguji;
            $dosenBersedia[$key]['id'] = $ketersediaanSeminar->dosen->id_dosen;
        }
        $data['seminars'] = SeminarTA::where('id_js', $id)->with([
            'tugasAkhir' =>  function($query){
                $query->with(['user','bidang', 'dosbing1', 'dosbing2']);
            }
        ])->orderBy('created_at')->get();
        $data['seminarDiterimas'] = SeminarTA::where([['id_js', '=', $id], ['status', '=', '1']])->with('tugasAkhir.bidang')->orderBy('created_at')->get();
        $data['dosenBersedias'] = $dosenBersedia;
        $data['hari'] = $dayList[$day];
        $data['jadwal'] = $jadwal;
        
        return view('penguji.formseminar', $data);
    }

    public function formPengujiSeminar(Request $request, $id){
        $seminarTA = SeminarTA::where('id_seminar_ta', $id)->first();
        if($request->penguji3){
            $seminarTA->id_penguji3 = $request->penguji3;
        }
        if($request->penguji4){
            $seminarTA->id_penguji4 = $request->penguji4;
        }
        if($request->penguji5){
            $seminarTA->id_penguji5 = $request->penguji5;
        }
        if($seminarTA->save()){
            return Redirect::to('/formpengujiseminar/'.$seminarTA->id_js);
        }
        else{
            return Redirect::to('/formpengujiseminar/'.$seminarTA->id_js)->withError('Gagal menyimpan penerimaan pengajuan jadwal seminar');
        }
    }

    public function terimaSeminar(Request $request){
        $seminarTA = SeminarTA::where('id_seminar_ta', $request->idSeminarTA)->with('tugasAkhir')->first();
        $seminarTA->status = 1;
        $penguji1 = $seminarTA->tugasAkhir->id_dosbing1;
        $penguji2 = $seminarTA->tugasAkhir->id_dosbing2;
        $seminarTA->id_penguji1 = $penguji1;
        $seminarTA->id_penguji2 = $penguji2;
        $seminarTA->tugasAkhir->id_status = 1;
        if($seminarTA->tugasAkhir->save() && $seminarTA->save()){
            return Redirect::to('/formpengujiseminar/'.$request->idJadwalSeminar);
        }
        else{
            return Redirect::to('/formpengujiseminar/'.$request->idJadwalSeminar)->withError('Gagal menyimpan penerimaan pengajuan jadwal seminar');
        }
    }

    public function batalkanSeminar(Request $request){
        $seminarTA = SeminarTA::where('id_seminar_ta', $request->idSeminarTA)->first();
        $seminarTA->status = 0;
        if($seminarTA->id_penguji1){
            $seminarTA->id_penguji1 = null;
        }
        if($seminarTA->id_penguji2){
            $seminarTA->id_penguji2 = null;
        }
        if($seminarTA->id_penguji3){
            $seminarTA->id_penguji3 = null;
        }
        if($seminarTA->id_penguji4){
            $seminarTA->id_penguji4 = null;
        }
        if($seminarTA->id_penguji5){
            $seminarTA->id_penguji5 = null;
        }
        if($seminarTA->save()){
            return Redirect::to('/formpengujiseminar/'.$request->idJadwalSeminar);
        }
        else{
            return Redirect::to('/formpengujiseminar/'.$request->idJadwalSeminar)->withError('Gagal menyimpan penerimaan pengajuan jadwal seminar');
        }
    }

    public function pengujiUjian(){
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
        
        $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
        $jadwals = JadwalUjian::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->get();
        $jumlahJadwal = count($jadwals);
        if($jumlahJadwal == 0){
            return Redirect::to('/error')->with('message', 'Halaman tidak ditemukan, tidak ada tanggal ujian yang sedang aktif saat ini');
        }
        else{
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
            
            return view('penguji.pengujiujian', $data);
        }
    }

    public function formUjian($id){
        $tanggal = Jadwal::where('nama', 'Tutup Ketersediaan Ujian')->first()->tanggal;
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $jadwal = JadwalUjian::where('id_ju', $id)->first();
        $day = date('D', strtotime($jadwal->tanggal));

        $ketersediaanUjians = KetersediaanUjian::where('id_ju', $id)->with([
            'dosen' => function($query){
                $query->with([
                    'penguji1Ujians' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji2Ujians' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji3Ujians' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji4Ujians' => function($query){
                        $query->where('status', '=', 1);
                    },'penguji5Ujians' => function($query){
                        $query->where('status', '=', 1);
                    },'bidangs.bidang'
                ]);
            }
        ])->get();
        $dosenBersedia = array();
        foreach ($ketersediaanUjians as $key => $ketersediaanUjian) {
            $dosenBersedia[$key]['nama_lengkap'] = $ketersediaanUjian->dosen->nama_lengkap;
            $dosenBersedia[$key]['nama'] = $ketersediaanUjian->dosen->nama;
            $string = "";
            if(count($ketersediaanUjian->dosen->bidangs) != 0){
                $string = "";
                foreach ($ketersediaanUjian->dosen->bidangs as $keys => $bidang) {
                    if($keys<1){
                        $string = $bidang->bidang->nama_bidang;
                    }
                    else{
                        $string = $string.", ".$bidang->bidang->nama_bidang;
                    }
                }
            }
            else{
                $string="tidak memiliki bidang";
            }
            $dosenBersedia[$key]['bidang'] = $string;
            $penguji1 = count($ketersediaanUjian->dosen->penguji1Ujians);
            $penguji2 = count($ketersediaanUjian->dosen->penguji2Ujians);
            $penguji3 = count($ketersediaanUjian->dosen->penguji3Ujians);
            $penguji4 = count($ketersediaanUjian->dosen->penguji4Ujians);
            $penguji5 = count($ketersediaanUjian->dosen->penguji5Ujians);
            $jumlahMenguji = $penguji1 + $penguji2 + $penguji3 + $penguji4 + $penguji5;
            $dosenBersedia[$key]['menguji'] = $jumlahMenguji;
            $dosenBersedia[$key]['id'] = $ketersediaanUjian->dosen->id_dosen;
        }
        $data['ujians'] = UjianTA::where('id_ju', $id)->with([
            'tugasAkhir' =>  function($query){
                $query->with(['user','rmk', 'dosbing1', 'dosbing2']);
            }
        ])->orderBy('created_at')->get();
        $data['ujianDiterimas'] = UjianTA::where([['id_ju', '=', $id], ['status', '=', '1']])->with('tugasAkhir.rmk')->orderBy('created_at')->get();
        $data['dosenBersedias'] = $dosenBersedia;
        $data['hari'] = $dayList[$day];
        $data['jadwal'] = $jadwal;
        
        return view('penguji.formujian', $data);
    }

    public function formPengujiUjian(Request $request, $id){
        $ujianTA = UjianTA::where('id_ujian_ta', $id)->first();
        if($request->penguji3){
            $ujianTA->id_penguji3 = $request->penguji3;
        }
        if($request->penguji4){
            $ujianTA->id_penguji4 = $request->penguji4;
        }
        if($request->penguji5){
            $ujianTA->id_penguji5 = $request->penguji5;
        }
        if($ujianTA->save()){
            return Redirect::to('/formpengujiujian/'.$ujianTA->id_ju);
        }
        else{
            return Redirect::to('/formpengujiujian/'.$ujianTA->id_ju)->withError('Gagal menyimpan penerimaan pengajuan jadwal ujian');
        }
    }

    public function terimaUjian(Request $request){
        $ujianTA = UjianTA::where('id_ujian_ta', $request->idUjianTA)->with('tugasAkhir')->first();
        $ujianTA->status = 1;
        $penguji1 = $ujianTA->tugasAkhir->id_dosbing1;
        $penguji2 = $ujianTA->tugasAkhir->id_dosbing2;
        $ujianTA->id_penguji1 = $penguji1;
        $ujianTA->id_penguji2 = $penguji2;
        $ujianTA->tugasAkhir->id_status = 5;
        if($ujianTA->tugasAkhir->save() && $ujianTA->save()){
            return Redirect::to('/formpengujiujian/'.$request->idJadwalUjian);
        }
        else{
            return Redirect::to('/formpengujiujian/'.$request->idJadwalUjian)->withError('Gagal menyimpan penerimaan pengajuan jadwal ujian');
        }
    }

    public function batalkanUjian(Request $request){
        $ujianTA = UjianTA::where('id_ujian_ta', $request->idUjianTA)->first();
        $ujianTA->status = 0;
        if($ujianTA->id_penguji1){
            $ujianTA->id_penguji1 = null;
        }
        if($ujianTA->id_penguji2){
            $ujianTA->id_penguji2 = null;
        }
        if($ujianTA->id_penguji3){
            $ujianTA->id_penguji3 = null;
        }
        if($ujianTA->id_penguji4){
            $ujianTA->id_penguji4 = null;
        }
        if($ujianTA->id_penguji5){
            $ujianTA->id_penguji5 = null;
        }
        if($ujianTA->save()){
            return Redirect::to('/formpengujiujian/'.$request->idJadwalUjian);
        }
        else{
            return Redirect::to('/formpengujiujian/'.$request->idJadwalUjian)->withError('Gagal menyimpan penerimaan pengajuan jadwal sidang');
        }
    }
}
