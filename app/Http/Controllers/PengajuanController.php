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
use App\RumpunMK;
use Carbon\Carbon;
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
            $data['pembimbing1s'] = Dosen::where('pembimbing1', 1)->orderBy('nama')->get();
            $data['pembimbing2s'] = Dosen::orderBy('nama')->get();
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
        //dd($request);
        $messagesError = [ 
            'judulTA.required' => 'Judul Tugas Akhir tidak boleh kosong',
            'bidangMK.required' => 'Rumpun Matakuliah tdak boleh kosong',
            'pembimbing1.required' => 'Dosen Pembimbing 1 tidak boleh kosong'
            ];

        $validator = Validator::make($request->all(), [ 
                'judulTA' => 'required',
                'bidangMK' => 'required',
                'pembimbing1' => 'required',
            ], $messagesError);

        if($validator->fails()) 
        {
            return Redirect::to(url('/pengajuan/create'))->withErrors($validator)->withInput();
        }
        else{
            $statusTA = StatusTA::where('id_status', 0)->first();
            $taBaru = new TugasAkhir();
            $taBaru->id_user = session('user')['id'];
            $taBaru->id_bidang_mk = $request->bidangMK;
            $taBaru->judul = $request->judulTA;
            $taBaru->temp_dosbing1 = $request->pembimbing1;
            $taBaru->temp_dosbing2 = $request->pembimbing2;
            //dd($taBaru);
            if(!$statusTA->tugasAkhirs()->save($taBaru)){
                return Redirect::to(url('/pengajuan/create'))->withErrors('Gagal Menyimpan Data');
            }
            $taUser = TugasAkhir::where('id_user', session('user')['id'])->where('id_status', '>=', '0')->first(['id_ta']);

            $dosen = Dosen::where('id_dosen', $request->pembimbing1)->first();
            $taDosen = TugasAkhir::where([['id_dosbing1','=',$dosen->id_dosen], ['id_status', '>=', '0'], ['id_status', '<=', '5']])->orWhere([['id_dosbing2','=',$dosen->id_dosen], ['id_status', '>=', '0'], ['id_status', '<=', '5']])->count();
            //dd($taDosen);
            $flagPembimbing1 = 0;
            $flagPembimbing2 = 0;
            if($dosen->pembimbing1 && $taDosen == 8){
                $flagPembimbing1 = 1;
            }
            else{
                $dosbing1 = new DosenPembimbing();
                $dosbing1->id_dosen = $request->pembimbing1;
                $dosbing1->id_ta = $taUser->id_ta;
                $dosbing1->peran = 1;
                $dosbing1->status = 0;
                if(!$dosbing1->save()){
                    return Redirect::to(url('/pengajuan/create'))->withErrors('Gagal Menyimpan Data pembimbing 1');
                }
            }

            if($request->pembimbing2){
                $dosen2 = Dosen::where('id_dosen', $request->pembimbing2)->first();
                $taDosen2 = TugasAkhir::where([['id_dosbing1','=',$dosen2->id_dosen], ['id_status', '>=', '0'], ['id_status', '<=', '5']])->orWhere([['id_dosbing2','=',$dosen2->id_dosen], ['id_status', '>=', '0'], ['id_status', '<=', '5']])->count();
                if($dosen2->pembimbing1 && $taDosen2 == 8){
                    $flagPembimbing2 = 1;
                }
                else{
                    $dosbing2 = new DosenPembimbing();
                    $dosbing2->id_dosen = $request->pembimbing2;
                    $dosbing2->id_ta = $taUser->id_ta;
                    $dosbing2->peran = 2;
                    $dosbing2->status = 0;
                    if(!$dosbing2->save()){
                        return Redirect::to(url('/pengajuan/create'))->withErrors('Gagal Menyimpan Data pembimbing 2');
                    }
                }
            }
             
            if($flagPembimbing1 || $flagPembimbing2){
                if($flagPembimbing1 && $flagPembimbing2){
                    return Redirect::to(url('/pengajuan/create'))->withErrors('Data TA sudah tersimpan, tidak dapat mengajukan permintaan bimbingan kepada kedua dosen terpilih karena bmbingan keuda tersebut dosen sudah penuh');
                }
                else if($flagPembimbing1){
                    return Redirect::to(url('/pengajuan/create'))->withErrors('Data TA sudah tersimpan, tidak dapat mengajukan permintaan bimbingan kepada '.$dosen->nama_lengkap.' karena bmbingan sudah penuh');
                }
                else{
                    return Redirect::to(url('/pengajuan/create'))->withErrors('Data TA sudah tersimpan, tidak dapat mengajukan permintaan bimbingan kepada '.$dosen->nama_lengkap.' karena bmbingan sudah penuh');
                }
            }
            else{
                return Redirect::to(url('/pengajuan/create'))->with('message','Sukses menyimpan data Pengajuan Tugas Akhir');
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
