<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KetersediaanUjian;
use App\JadwalUjian;
use App\Jadwal;
use App\TugasAkhir;
use App\UjianTA;
use Redirect;

class SidangController extends Controller
{
    public function ujianJadwal(){
        $ujianTA = UjianTA::where('status', 1)->orderBy('created_at')->with([
            'jadwalUjian' => function($query){
                $query->orderBy('tanggal', 'des')->orderBy('sesi');
            }, 'tugasAkhir' => function($query){
                $query->with(['bidang', 'user']);
            }, 'penguji1Ujian', 'penguji2Ujian', 'penguji3Ujian', 'penguji4Ujian', 'penguji5Ujian',
        ])->get();
        $data['ujians'] = $ujianTA;
        
        return view('sidang.index', $data);
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
        $tanggalBuka = Jadwal::where('nama', 'Buka Ketersediaan Ujian')->first()->tanggal;
        if((time()-(60*60*24)) > strtotime($tanggalBuka) && (time()-(60*60*24)) < strtotime($tanggalTutup)){
            $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
            $jadwals = JadwalUjian::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->orderBy('sesi')->get();
            $jumlahJadwal = count($jadwals);
            
            if($jumlahJadwal == 0){
                return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena jadwal sidang belum disediakan');
            }
            else{
                foreach ($jadwals as $key => $jadwal) {
                    $jadwalUjian[$jadwal->tanggal][$jadwal->sesi] = $jadwal->id_ju;
                }

                $dosens = KetersediaanUjian::where('id_dosen', session('user')['id_dosen'])->with(['jadwalUjian' => function($query) use ($awalSemester){
                    $query->where('tanggal', '>', $awalSemester);
                }])->get();
                
                foreach ($dosens as $key => $dosen) {
                    if($dosen->jadwalUjian){
                        $ketersediaanDosen[$dosen->jadwalUjian->tanggal][$dosen->jadwalUjian->sesi] = 1;
                    }
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
        }
        else{
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena pengisian ketersediaan seminar belum dibuka');
        }
        
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

    public function pengajuanJadwal(){
        $batasTanggalBawah = Jadwal::where('nama', 'Buka Pengajuan Jadwal Ujian')->first()->tanggal;
        $batasTanggalAtas = Jadwal::where('nama', 'Tutup Pengajuan Jadwal Ujian')->first()->tanggal;
        if((time()-(60*60*24)) > strtotime($batasTanggalBawah) && (time()-(60*60*24)) < strtotime($batasTanggalAtas)){
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
            
            $ujianTA = UjianTA::where('id_ta', $tugasAkhir->id_ta)->first();
            if($ujianTA){
                $jadwalTerdaftar = JadwalUjian::where('id_ju', $ujianTA->id_ju)->first();
                $data['ujians'] = UjianTA::where([['id_ju', '=',$ujianTA->id_ju], ['status', '>=', '0'], ['status', '<=','1']])->with('tugasAkhir.user')->orderBy('created_at')->get();
                $day = date('D', strtotime($jadwalTerdaftar->tanggal));
                $data['hari'] = $dayList[$day];
                $data['jadwalTerdaftar'] = $jadwalTerdaftar;
            }
            $data['ujianTA'] = $ujianTA;

            $ketersediaanDosen = array();
            $jadwalUjian = array();
            $tanggalUjians = array();
            
            $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
            $jadwals = JadwalUjian::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->orderBy('sesi')->get();
            $jumlahJadwal = count($jadwals);
            if($jumlahJadwal == 0){
                return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena jadwal sidang belum disediakan');
            }
            else{
                if($tugasAkhir->id_dosbing1 && $tugasAkhir->id_dosbing2){
                    $dosens = KetersediaanUjian::where('id_dosen', $tugasAkhir->id_dosbing1)->orWhere('id_dosen', $tugasAkhir->id_dosbing2)->with(['jadwalUjian' => function($query) use ($awalSemester){
                        $query->where('tanggal', '>', $awalSemester);
                    }])->get();
                }
                elseif(!$tugasAkhir->id_dosbing2 || !$tugasAkhir->id_dosbing1){
                    if($tugasAkhir->id_dosbing1){
                        $dosens = KetersediaanUjian::where('id_dosen', $tugasAkhir->id_dosbing1)->with(['jadwalUjian' => function($query) use ($awalSemester){
                            $query->where('tanggal', '>', $awalSemester);
                        }])->get();
                    }
                    else{
                        $dosens = KetersediaanUjian::where('id_dosen', $tugasAkhir->id_dosbing2)->with(['jadwalUjian' => function($query) use ($awalSemester){
                            $query->where('tanggal', '>', $awalSemester);
                        }])->get();
                    }
                }
                else{
                    return Redirect::to('/error')->with('message', 'Tidak dapat mengajukan jadwal sidang karena anda tidak memiliki dosen pembimbing');
                }
                
                //dd($dosens);
                foreach ($dosens as $key => $dosen) {
                    if($dosen->jadwalUjian){
                        if($dosen->id_dosen == $tugasAkhir->id_dosbing1){
                            $ketersediaanDosen[$dosen->jadwalUjian->tanggal][$dosen->jadwalUjian->sesi][1] = 1;
                        }
                        else if($dosen->id_dosen == $tugasAkhir->id_dosbing2){
                            $ketersediaanDosen[$dosen->jadwalUjian->tanggal][$dosen->jadwalUjian->sesi][2] = 1;
                        }
                    }
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

                return view('sidang.pengajuan', $data);
            }    
        }
        else{
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena pengajuan jadwal sidang belum dibuka');
        }
        

    }

    public function formPengajuan($id){
        $batasTanggalBawah = Jadwal::where('nama', 'Buka Pengajuan Jadwal Ujian')->first()->tanggal;
        $batasTanggalAtas = Jadwal::where('nama', 'Tutup Pengajuan Jadwal Ujian')->first()->tanggal;
        if((time()-(60*60*24)) > strtotime($batasTanggalBawah) && (time()-(60*60*24)) < strtotime($batasTanggalAtas)) {
            $tugasAkhir = TugasAkhir::where([['id_user', session('user')['id']],['id_status', '>=', '0']])->first();
            $ujianTA = UjianTA::where('id_ta', $tugasAkhir->id_ta)->first();
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
            $data['ujianTA'] = $ujianTA;
            $data['ujians'] = UjianTA::where([['id_ju', '=',$id], ['status', '<', '2']])->with('tugasAkhir.user')->orderBy('created_at')->get();
            $data['hari'] = $dayList[$day];
            $data['jadwal'] = $jadwal;
            return view('sidang.formpengajuan', $data);
        }
        else{
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena pengajuan jadwal sidang belum dibuka');
        }
    }

    public function doPengajuan(Request $request){
        $tugasAkhir = TugasAkhir::where([['id_user', session('user')['id']],['id_status', '>=', '0'],['id_status', '<=', '5']])->first();
        $ujianTA = new UjianTA();
        $ujianTA->id_ta = $tugasAkhir->id_ta;
        $ujianTA->id_ju = $request->idJadwal;
        $ujianTA->status = 0;
        if($ujianTA->save()){
            return Redirect::to(url('/pengajuanujian'))->with('message', 'Berhasil menyimpan data pengajuan jadwal sidang');
        }
        else{
            return Redirect::to(url('/formpengajuanujian'.$request->idJadwal))->withError('Gagal menyimpan data pengajuan silahkan coba lagi');
        }
    }

    public function pembatalanJadwal(Request $request){
        $ujianTA = UjianTA::where('id_ujian_ta', $request->idUjian)->first();
        if($ujianTA->delete()){
            return Redirect::to(url('/pengajuanujian'))->with('message', 'Berhasil membatalkan pengajuan TA');
        }
        else{
            return Redirect::to(url('/pengajuanujian'))->withError('Gagal membatalkan pengajuan TA, silahkan coba lagi');
        }
    }
}
