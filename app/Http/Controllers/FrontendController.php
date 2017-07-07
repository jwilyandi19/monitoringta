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

    public function detailProgres(){
    	return view('detail-progres');
    }
}
