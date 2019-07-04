<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TugasAkhir;
use App\Dosen;

class PencarianController extends Controller
{
    public function pencarianTA(){
        $data['tugasAkhirs'] = TugasAkhir::with(['bidang', 'status', 'user', 'dosbing1', 'dosbing2'])->orderBy('id_ta', 'desc')->get();
        $data['pembimbing1temps'] = [];
        $data['pembimbing2temps'] = [];
        foreach($data['tugasAkhirs'] as $tugasAkhir) {
            $dosen1 = Dosen::where('id_dosen',$tugasAkhir->temp_dosbing1)->first();
            $dosen2 = Dosen::where('id_dosen',$tugasAkhir->temp_dosbing2)->first();
            array_push($data['pembimbing1temps'], $dosen1);
            array_push($data['pembimbing2temps'], $dosen2);
        }

        return view('pencarian.index', $data);
    }
}
