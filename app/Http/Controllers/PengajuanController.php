<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Html\FormFacade;
use Illuminate\Http\Request;
use App\DosenPembimbing;
use App\TugasAkhir;
use App\BidangMK;
use App\StatusTA;
use App\Dosen;
use Response;
use Redirect;
use Session;
use DB;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ta = TugasAkhir::where('id_user', session('user')['id'])->where('id_status', '>=', '0')->first();
        if($ta){
            return view('pengajuan.sudah');
        }
        else{
            $data['bidang_mks'] = BidangMK::all();
            $data['dosens'] = Dosen::all();
            return view('pengajuan.index', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messagesError = [ 
            'judulTA.required' => 'Judul Tugas Akhir tidak boleh kosong',
            'bidangMk.required' => 'Bidang Matakuliah tidak boleh kosong',
            'pembimbing1.required' => 'Dosen Pembimbing 1 tidak boleh kosong'
            ];

        $validator = Validator::make($request->all(), [ 
                'judulTA' => 'required',
                'bidangMk' => 'required',
                'pembimbing1' => 'required',
            ], $messagesError);

        if($validator->fails()) 
        {
            return Redirect::to(url('pengajuan/create'))->withErrors($validator)->withInput();
        }
        else{
            $statusTA = StatusTA::find(0);
            $taBaru = new TugasAkhir();
            $taBaru->id_user = session('user')['id'];
            $taBaru->id_bidang_mk = $request->bidangMk;
            $taBaru->judul = $request->judulTA;
            $taBaru->tanggal = date('Y-m-d');
            if(!$statusTA->TAs()->save($taBaru)){
                return Redirect::to(url('pengajuan/create'))->withErrors('Gagal Menyimpan Data');
            }

            $taUser = TugasAkhir::where('id_user', session('user')['id'])->where('id_status', '>=', '0')->first(['id_ta']);
            $dosbing1 = new DosenPembimbing();
            $dosbing1->id_dosen = $request->pembimbing1;
            $dosbing1->id_ta = $taUser->id_ta;
            $dosbing1->peran = 1;
            $dosbing1->status = 0;
            if(!$dosbing1->save()){
                return Redirect::to(str_replace('/create', '', $request->url()))->withErrors('Gagal Menyimpan Data');
            }

            if($request->pembimbing2){
                $dosbing2 = new DosenPembimbing();
                $dosbing2->id_dosen = $request->pembimbing2;
                $dosbing2->id_ta = $taUser->id_ta;
                $dosbing2->peran = 2;
                $dosbing2->status = 0;
                if(!$dosbing2->save()){
                    return Redirect::to(url('pengajuan/create'))->withErrors('Gagal Menyimpan Data');
                }
                else{
                    return Redirect::to(url('pengajuan/create'))->with('message','Sukses menyimpan data Pengajuan Tugas Akhir');
                }

            }
            else{
                return Redirect::to(url('pengajuan/create'))->with('message','Sukses menyimpan data Pengajuan Tugas Akhir');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
