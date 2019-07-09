<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KetersediaanSeminar;
use App\KetersediaanUjian;
use App\Jadwal;
use App\JadwalSeminar;
use App\JadwalUjian;
use App\Dosen;
use Redirect;

class KetersediaanController extends Controller
{
    public function ketersediaanSeminar() {
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

        $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
        $jadwals = JadwalSeminar::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->orderBy('ruang')->orderBy('sesi')->get();
        $jumlahJadwal = count($jadwals);
        if($jumlahJadwal == 0){
            return Redirect::to(url('/error'))->withErrors('Halaman tidak tersedia karena jadwal seminar belum disediakan');
        }
        else {
            $dosens = Dosen::all();
            foreach($dosens as $dosen) {
                foreach($jadwals as $jadwal) {
                    if(KetersediaanSeminar::where([['id_dosen',$dosen->id_dosen],['id_js',$jadwal->id_js]])->first()) {
                        $ketersediaanDosen[$dosen->id_dosen][$jadwal->id_js] = 1;
                    }
                    else {
                        $ketersediaanDosen[$dosen->id_dosen][$jadwal->id_js] = 0;
                    }
                }
            }
            $data['ketersediaanDosen'] = $ketersediaanDosen;
            $data['jadwals'] = $jadwals;
            $data['dosens'] = $dosens;

            return view('ketersediaan.seminar',$data);
        }
    }

    public function ketersediaanSidang() {
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

        $awalSemester = Jadwal::where('nama', 'Awal Semester')->first()->tanggal;
        $jadwals = JadwalUjian::where('tanggal', '>', $awalSemester)->orderBy('tanggal')->orderBy('ruang')->orderBy('sesi')->get();
        $jumlahJadwal = count($jadwals);
        if($jumlahJadwal == 0){
            return Redirect::to(url('/error'))->withErrors('Halaman tidak tersedia karena jadwal sidang belum disediakan');
        }
        else {
            $dosens = Dosen::all();
            foreach($dosens as $dosen) {
                foreach($jadwals as $jadwal) {
                    if(KetersediaanUjian::where([['id_dosen',$dosen->id_dosen],['id_ju',$jadwal->id_ju]])->first()) {
                        $ketersediaanDosen[$dosen->id_dosen][$jadwal->id_ju] = 1;
                    }
                    else {
                        $ketersediaanDosen[$dosen->id_dosen][$jadwal->id_ju] = 0;
                    }
                }
            }
            $data['ketersediaanDosen'] = $ketersediaanDosen;
            $data['jadwals'] = $jadwals;
            $data['dosens'] = $dosens;

            return view('ketersediaan.sidang',$data);
        }
    }
}
