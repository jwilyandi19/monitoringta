<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Jadwal;
use App\Dosen;
use App\KetersediaanSeminar;
use App\JadwalSeminar;
use App\SeminarTA;

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
        
        $tanggalTutup = Jadwal::where('nama', 'Tutup Ketersediaan Seminar')->first()->tanggal;
        $jadwals = JadwalSeminar::where('tanggal', '>', $tanggalTutup)->orderBy('tanggal')->get();
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
            'dosen' => function($query) use($tanggal){
                $query->with([
                    'penguji1s.jadwalSeminar' => function($query) use($tanggal){
                        $query->where('tanggal', '>', $tanggal);
                    },'penguji2s.jadwalSeminar' => function($query) use($tanggal){
                        $query->where('tanggal', '>', $tanggal);
                    },'penguji3s.jadwalSeminar' => function($query) use($tanggal){
                        $query->where('tanggal', '>', $tanggal);
                    },'penguji4s.jadwalSeminar' => function($query) use($tanggal){
                        $query->where('tanggal', '>', $tanggal);
                    },'penguji5s.jadwalSeminar' => function($query) use($tanggal){
                        $query->where('tanggal', '>', $tanggal);
                    },'rmks'
                ]);
            }
        ])->get();
        $dosenBersedia = array();
        foreach ($ketersediaanSeminars as $key => $ketersediaanSeminar) {
            $dosenBersedia[$key]['nama_lengkap'] = $ketersediaanSeminar->dosen->nama_lengkap;
            $dosenBersedia[$key]['nama'] = $ketersediaanSeminar->dosen->nama;
            $string = "";
            if(count($ketersediaanSeminar->dosen->rmks) != 0){
                $string = "";
                foreach ($ketersediaanSeminar->dosen->rmks as $key => $rmk) {
                    if($key<1){
                        $string = $rmk->nama_rumpun;
                    }
                    else{
                        $string = $string.", ".$rmk->nama_rumpun;
                    }
                }
            }
            else{
                $string="tidak memiliki rmk";
            }
            $dosenBersedia[$key]['rmk'] = $string;
            $penguji1 = count($ketersediaanSeminar->dosen->penguji1s);
            $penguji2 = count($ketersediaanSeminar->dosen->penguji2s);
            $penguji3 = count($ketersediaanSeminar->dosen->penguji3s);
            $penguji4 = count($ketersediaanSeminar->dosen->penguji4s);
            $penguji5 = count($ketersediaanSeminar->dosen->penguji5s);
            $jumlahMenguji = $penguji1 + $penguji2 + $penguji3 + $penguji4 + $penguji5;
            $dosenBersedia[$key]['menguji'] = $jumlahMenguji;
            $dosenBersedia[$key]['id'] = $ketersediaanSeminar->dosen->id_dosen;
            //print_r($dosenBersedia[$key]);
        }
        $data['seminars'] = SeminarTA::where('id_js', $id)->with([
            'tugasAkhir' =>  function($query){
                $query->with(['user','rmk', 'dosbing1', 'dosbing2']);
            }
        ])->orderBy('created_at')->get();
        $data['seminarDiterimas'] = SeminarTA::where([['id_js', '=', $id], ['status', '=', '1']])->with('tugasAkhir.rmk')->orderBy('created_at')->get();
        $data['dosenBersedias'] = $dosenBersedia;
        $data['hari'] = $dayList[$day];
        $data['jadwal'] = $jadwal;
        //dd($ketersediaanSeminars);

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
        echo $id;
        dd($request);
    }

    public function terimaSeminar(Request $request){
        $seminarTA = SeminarTA::where('id_seminar_ta', $request->idSeminarTA)->with('tugasAkhir')->first();
        $seminarTA->status = 1;
        $penguji1 = $seminarTA->tugasAkhir->id_dosbing1;
        $penguji2 = $seminarTA->tugasAkhir->id_dosbing2;
        $seminarTA->id_penguji1 = $penguji1;
        $seminarTA->id_penguji2 = $penguji2;
        $seminarTA->tugasAkhir->id_status = 1;
        //dd($seminarTA);
        if($seminarTA->tugasAkhir->save() && $seminarTA->save()){
            return Redirect::to('/formpengujiseminar/'.$request->idJadwalSeminar);
        }
        else{
            return Redirect::to('/formpengujiseminar/'.$request->idJadwalSeminar)->withError('Gagal menyimpan penerimaan pengajuan jadwal seminar');
        }
    }
}
