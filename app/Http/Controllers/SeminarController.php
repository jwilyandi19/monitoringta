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
    public function seminarJadwal(){
        $seminarTA = SeminarTA::where('status', 1)->orderBy('created_at')->with([
            'jadwalSeminar' => function($query){
                $query->orderBy('tanggal', 'des')->orderBy('ruang')->orderBy('sesi');
            }, 'tugasAkhir' => function($query){
                $query->with(['bidang', 'user']);
            }, 'penguji1', 'penguji2', 'penguji3', 'penguji4', 'penguji5',
        ])->get();
        $data['seminars'] = $seminarTA;
        
        return view('seminar.index', $data);
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
        
        $tanggalBuka = Jadwal::where('nama', 'Buka Ketersediaan Seminar')->first()->tanggal;
        $tanggalTutup = Jadwal::where('nama', 'Tutup Ketersediaan Seminar')->first()->tanggal;
        if((time()-(60*60*24)) > strtotime($tanggalBuka) && (time()-(60*60*24)) < strtotime($tanggalTutup)){
            $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
            $jadwals = JadwalSeminar::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->orderBy('ruang')->orderBy('sesi')->get();
            $jumlahJadwal = count($jadwals);
            
            if($jumlahJadwal == 0){
                return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena jadwal seminar belum disediakan');
            }
            else{
                foreach ($jadwals as $key => $jadwal) {
                    $jadwalSeminar[$jadwal->tanggal][$jadwal->ruang][$jadwal->sesi] = $jadwal->id_js;
                }

                $dosens = KetersediaanSeminar::where('id_dosen', session('user')['id_dosen'])->with(['jadwalSeminar' => function($query) use ($awalSemester){
                    $query->where('tanggal', '>', $awalSemester);
                }])->get();
                foreach ($dosens as $key => $dosen) {
                    if($dosen->jadwalSeminar){
                        $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->ruang][$dosen->jadwalSeminar->sesi] = 1;
                    }
                }

                $jadwalseminards = JadwalSeminar::where('sesi','1')->get();
                //dd($jadwalseminards);
                foreach ($jadwalseminards as $key => $jadwalseminard) {
                    //dd($jadwalSeminar[$date]);
                    $tanggalSeminars[$key]['tanggal'] = $jadwalseminard->tanggal;
                    $day = date('D', strtotime($jadwalseminard->tanggal));
                    $tanggalSeminars[$key]['hari'] = $dayList[$day];
                    $tanggalSeminars[$key]['ruang'] = $jadwalseminard->ruang;
                    $tanggalSeminars[$key]['sesi'] = $jadwalSeminar[$jadwalseminard->tanggal][$jadwalseminard->ruang];
    
                }
                $data['tanggalSeminars'] = $tanggalSeminars;
                $data['ketersediaanDosen'] = $ketersediaanDosen;
                //dd($data);
                return view('seminar.ketersediaan', $data);
            }
        }
        else{
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena pengisian ketersediaan seminar belum dibuka');
            
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
        $batasTanggalBawah = Jadwal::where('nama', 'Buka Pengajuan Jadwal Seminar')->first()->tanggal;
        $batasTanggalAtas = Jadwal::where('nama', 'Tutup Pengajuan Jadwal Seminar')->first()->tanggal;
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
            if(is_null($tugasAkhir)) {
                return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena anda belum mengajukan Tugas Akhir. Pastikan Anda mengajukan Tugas Akhir terlebih dahulu.');
            }
            else {
                $seminarTA = SeminarTA::where('id_ta', $tugasAkhir->id_ta)->first();
                if($seminarTA){
                    $jadwalTerdaftar = JadwalSeminar::where('id_js', $seminarTA->id_js)->first();
                    $data['seminars'] = SeminarTA::where([['id_js', '=',$seminarTA->id_js], ['status', '>=', '0'], ['status', '<=', '1']])->with('tugasAkhir.user')->orderBy('created_at')->get();
                    $day = date('D', strtotime($jadwalTerdaftar->tanggal));
                    $data['hari'] = $dayList[$day];
                    $data['jadwalTerdaftar'] = $jadwalTerdaftar;
                    $data['ruang'] = $jadwalTerdaftar->ruang;
                }
                $data['seminarTA'] = $seminarTA;

                $ketersediaanDosen = array();
                $jadwalSeminar = array();
                $tanggalSeminars = array();
                
                $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
                $jadwals = JadwalSeminar::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->orderBy('ruang')->orderBy('sesi')->get();
                $jumlahJadwal = count($jadwals);
                if($jumlahJadwal == 0){
                    return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena jadwal seminar belum disediakan');
                }
                else{
                    if($tugasAkhir->id_dosbing1 && $tugasAkhir->id_dosbing2){
                        $dosens = KetersediaanSeminar::where('id_dosen', $tugasAkhir->id_dosbing1)->orWhere('id_dosen', $tugasAkhir->id_dosbing2)->with(['jadwalSeminar' => function($query) use ($awalSemester){
                            $query->where('tanggal', '>', $awalSemester);
                        }])->get();
                    }
                    elseif(!$tugasAkhir->id_dosbing2 || !$tugasAkhir->id_dosbing1){
                        if($tugasAkhir->id_dosbing1){
                            $dosens = KetersediaanSeminar::where('id_dosen', $tugasAkhir->id_dosbing1)->with(['jadwalSeminar' => function($query) use ($awalSemester){
                                $query->where('tanggal', '>', $awalSemester);
                            }])->get();
                        }
                        else{
                            $dosens = KetersediaanSeminar::where('id_dosen', $tugasAkhir->id_dosbing2)->with(['jadwalSeminar' => function($query) use ($awalSemester){
                                $query->where('tanggal', '>', $awalSemester);
                            }])->get();
                        }
                    }
                    else{
                        return Redirect::to('/error')->with('message', 'Tidak dapat mengajukan jadwal semminar karena anda tidak memiliki dosen pembimbing');
                    }
                    
                    foreach ($dosens as $key => $dosen) {
                        if($dosen->jadwalSeminar){
                            if($dosen->id_dosen == $tugasAkhir->id_dosbing1){
                                $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->ruang][$dosen->jadwalSeminar->sesi][1] = 1;
                            }
                            else if($dosen->id_dosen == $tugasAkhir->id_dosbing2){
                                $ketersediaanDosen[$dosen->jadwalSeminar->tanggal][$dosen->jadwalSeminar->ruang][$dosen->jadwalSeminar->sesi][2] = 1;
                            }
                        }
                    }
                    foreach ($jadwals as $key => $jadwal) {
                        $jadwalSeminar[$jadwal->tanggal][$jadwal->ruang][$jadwal->sesi] = $jadwal->id_js;
                    }

                    $jadwalseminards = JadwalSeminar::where('sesi','1')->get();
                    //dd($jadwalseminards);
                    foreach ($jadwalseminards as $key => $jadwalseminard) {
                        //dd($jadwalSeminar[$date]);
                        $tanggalSeminars[$key]['tanggal'] = $jadwalseminard->tanggal;
                        $day = date('D', strtotime($jadwalseminard->tanggal));
                        $tanggalSeminars[$key]['hari'] = $dayList[$day];
                        $tanggalSeminars[$key]['ruang'] = $jadwalseminard->ruang;
                        $tanggalSeminars[$key]['sesi'] = $jadwalSeminar[$jadwalseminard->tanggal][$jadwalseminard->ruang];
        
                    }
                    $data['tanggalSeminars'] = $tanggalSeminars;
                    $data['ketersediaanDosen'] = $ketersediaanDosen;
                    return view('seminar.pengajuan', $data);
                }
            }
        }
        else{
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena pengajuan jadwal seminar belum dibuka');
        }
        

    }

    public function formPengajuan($id){
        $batasTanggalBawah = Jadwal::where('nama', 'Buka Pengajuan Jadwal Seminar')->first()->tanggal;
        $batasTanggalAtas = Jadwal::where('nama', 'Tutup Pengajuan Jadwal Seminar')->first()->tanggal;
        if((time()-(60*60*24)) > strtotime($batasTanggalBawah) && (time()-(60*60*24)) < strtotime($batasTanggalAtas)){
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
            $data['seminars'] = SeminarTA::where([['id_js', '=',$id], ['status', '<', '2']])->with('tugasAkhir.user')->orderBy('created_at')->get();
            $data['hari'] = $dayList[$day];
            $data['jadwal'] = $jadwal;
            return view('seminar.formpengajuan', $data);
        }
        else{
            return Redirect::to(url('/error'))->with('message', 'Halaman tidak tersedia karena pengajuan jadwal seminar belum dibuka');
        }
    }

    public function doPengajuan(Request $request){
        $tugasAkhir = TugasAkhir::where([['id_user', session('user')['id']],['id_status', '>=', '0'],['id_status', '<=', '5']])->first();
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
        $id_js = $request->idJadwalSeminar;
        if($seminarTA->delete()){
            return Redirect::to(url('/formpengujiseminar/'.$id_js))->with('message', 'Berhasil membatalkan pengajuan jadwal seminar TA');
        }
        else{
            return Redirect::to(url('/formpengujiseminar/'.$id_js))->withError('Gagal membatalkan pengajuan jadwal seminar TA, silahkan coba lagi');
        }
    }

    public function uploadFile(Request $request){
        if($request->hasFile('fileSeminar') && $request->file('fileSeminar')->isValid()){
            $file = $request->fileSeminar;
            if($file->guessExtension() != 'pdf'){
                return Redirect::to('/detailta')->withErrors('Gagal menyimpan file, ekstensi file yang diupload bukan .pdf');
            }
            else{
                
                $fileOriginal = $file->getClientOriginalName();
                $fileName = "seminar_".session('user')['username']."_".$request->idTA.".pdf";
                $path = 'public/file_ta/'.session('user')['username']."_".$request->idTA;

                $seminar = SeminarTA::where('id_ta', $request->idTA)->first();
                if(!$seminar->file){
                    $seminar->file = 1;
                    if($seminar->save()){
                        $flag = $request->fileSeminar->storeAs($path."/", $fileName);
                        if($flag){
                            return Redirect::to('/detailta')->with('message', 'Berhasil menyimpan file seminar');
                        }
                        else{
                            return Redirect::to('/detailta')->withErrors('Gagal menyimpan file, terjadi kesalahan dalam proses upload file, silahkan coba lagi');
                        }
                    }
                    else{
                        return Redirect::to('/detailta')->withErrors('Gagal menyimpan file tugas akhir, terjadi kesalahan dalam proses penyimpanan data, silahkan coba lagi');
                    }

                }
                else{
                    $flag = $request->fileSeminar->storeAs($path, $fileName);
                    if($flag){
                        return Redirect::to('/detailta')->with('message', 'Berhasil menyimpan file terbaru');
                    }
                    else{
                        return Redirect::to('/detailta')->withErrors('Gagal menyimpan file, terjadi kesalahan dalam proses upload file, silahkan coba lagi');
                    }
                }
                
            }
        }
        else{
            return Redirect::to('/detailta')->withErrors('Gagal menyimpan file, terjadi kesalahan dalam proses upload file, silahkan coba lagi!!');
        }
    }


}
