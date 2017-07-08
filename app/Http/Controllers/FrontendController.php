<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
    	return view('home');
    }

    public function pengajuanTa(){
    	return view('pengajuan-ta');
    }

    public function statusProposal(){
    	return view('status-proposal');
    }

    public function detailTa(){
    	return view('detailta');
    }

    public function detailTa2(){
        return view('detailta2');
    }

    public function ketersediaanDosen(){
        return view('ketersediaandosen');
    }

    public function pengajuanJadwal(){
        return view('pengajuanjadwal');
    }

    public function statusTa(){
        return view('statusta');
    }

    public function mahasiswaBimbingan(){
        return view('mahasiswabimbingan');
    }

    public function tambahkanJadwal(){
        return view('tambahkanjadwal');
    }
}
