<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TugasAkhir;

class PencarianController extends Controller
{
    public function pencarianTA(){
    	$data['tugasAkhirs'] = TugasAkhir::with(['bidang', 'status', 'user', 'dosbing1', 'dosbing2'])->orderBy('id_ta', 'desc')->get();

        return view('pencarian.index', $data);
    }
}
