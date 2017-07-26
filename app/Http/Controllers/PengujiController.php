<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Jadwal;
use App\Dosen;
use App\KetersediaanSeminar;
use App\JadwalSeminar;

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
    	$dosenBersedia = Dosen::with([
    		'ketersediaanSeminars' => function($query) use($id){
    			$query->where('id_js', '=', $id);
    		}, 'pengujiSeminars'])->get();
    	dd($dosenBersedia);
    }
}
