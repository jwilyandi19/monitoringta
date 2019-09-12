<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\DosenPembimbing;
use App\TugasAkhir;
use App\Asistensi;
use App\Dosen;
use Redirect;
use App\BidangMK;
Use App\SeminarTA;
Use App\UjianTA;
use App\Jadwal;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['konfirmasis'] = DosenPembimbing::where([ 
            ['id_dosen', '=', session('user')['id_dosen']], 
            ['status', '=', '0']])->orderBy('created_at')->with(['tugasAkhir' => function($query){
                $query->where('id_status','>=','0')->with('user');
            }])->get();
        $data['bimbingans'] = TugasAkhir::where([['id_status', '>=', '0'], ['id_status', '<=', '5'], ['id_dosbing1', session('user')['id_dosen']]])->orWhere([['id_status', '>=', '0'], ['id_status', '<=', '5'], ['id_dosbing2', session('user')['id_dosen']]])->orderBy('created_at')->with('user')->paginate(15);
        return view('bimbingan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ta)
    {
        $detailta = TugasAkhir::where('id_ta',$id_ta)->with(['user','dosbing1','dosbing2','status','bidang',
            'seminarTA' => function($query){
                $query->with(['penguji1','penguji2','penguji3','penguji4','penguji5','jadwalSeminar']);
            },'ujianTA' => function($query){
                $query->with(['penguji1Ujian','penguji2Ujian','penguji3Ujian','penguji4Ujian','penguji5Ujian','jadwalUjian']);
            }])->first();
        if($detailta){
            $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
            );

            $tanggalBuat = $detailta->created_at;
            $tahunBuat = date('Y', strtotime($tanggalBuat));
            $bulanBuat = date('m', strtotime($tanggalBuat));
            $intBulanBuat = (int)$bulanBuat;
            //dd($bulanBuat);
            if($intBulanBuat <= 7){
                $tahun1 = $tahunBuat-1;
                $tahun2 = $tahunBuat;
                $dibuat = 'Bulan '.$bulan[$bulanBuat].' Tahun Ajaran '.$tahun1.'/'.$tahun2;
            }
            elseif($intBulanBuat > 7){
                $tahun1 = $tahunBuat;
                $tahun2 = $tahunBuat+1;
                $dibuat = 'Bulan '.$bulan[$bulanBuat].' Tahun Ajaran '.$tahun1.'/'.$tahun2;
            }
            unset($tanggalBuat);
            $tanggalBuat = date_create(date('Y-m-d',strtotime($detailta->created_at)));
            $tanggalSekarang = date_create(date('Y-m-d',time()));
            $jarak = date_diff($tanggalBuat, $tanggalSekarang);
            $jarak = (int) $jarak->format('%m');
            $semester = ($jarak / 6) + 1;

            $data['semester'] = $semester;
            $data['dibuat'] = $dibuat;
            $data['detailta'] = $detailta;
            $data['bidang_mks'] = BidangMK::all();
            $data['asistensi0s'] = Asistensi::where([['id_ta',$detailta->id_ta],['disetujui','0']])->with('dosen')->get();
            $data['asistensi1s'] = Asistensi::where([['id_ta',$detailta->id_ta],['disetujui','1']])->with('dosen')->get();
            $data['pembimbing1'] = Dosen::where('id_dosen',$detailta->temp_dosbing1)->first();
            $data['pembimbing2'] = Dosen::where('id_dosen',$detailta->temp_dosbing2)->first();
            $data['penguji1'] = UjianTA::where([['id_penguji1',session('user')['id_dosen']],['id_ta',$detailta->id_ta]])->first();
            $data['penguji2'] = UjianTA::where([['id_penguji2',session('user')['id_dosen']],['id_ta',$detailta->id_ta]])->first();
            $data['penguji3'] = NULL;
            $data['penguji4'] = NULL;
            $data['penguji5'] = NULL;
            return view('bimbingan.detail_bimbingan',$data);
        }
        else
        {
            return view('home');
        }
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

    public function konfirmasiTA(Request $request){
        
        $bimbingan = DosenPembimbing::where([['id_ta', '=', $request->idTugasAkhir],['id_dosen', '=', session('user')['id_dosen']]])->first();
        $bimbingan->status = 1;
        if($bimbingan->save()){
            $tugasAkhir = TugasAkhir::where('id_ta', $bimbingan->id_ta)->first();
            if($bimbingan->peran == 1){
                $tugasAkhir->id_dosbing1 = session('user')['id_dosen'];   
            }
            elseif($bimbingan->peran == 2){
                $tugasAkhir->id_dosbing2 = session('user')['id_dosen'];
            }
            
            if($tugasAkhir->save()){
                return Redirect::to('/bimbingan')->with('message', 'Konfirmasi penerimaan bimbingan berhasil dilakukan');
            }
        }
        else{
            return Redirect::to('/bimbingan')->withErrors('Konfirmasi penerimaan bimbingan gagal dilakukan');
        }
    }

    public function tolakTA(Request $request){
        $bimbingan = DosenPembimbing::where([['id_ta', '=', $request->idTugasAkhir],['id_dosen', '=', session('user')['id_dosen']]])->first();
        $pembimbing1 = TugasAkhir::where([['id_ta', '=', $request->idTugasAkhir],['temp_dosbing1', '=', session('user')['id_dosen']]])->first();
        $pembimbing2 = TugasAkhir::where([['id_ta', '=', $request->idTugasAkhir],['temp_dosbing2', '=', session('user')['id_dosen']]])->first();
        if($bimbingan->delete()){
            if($pembimbing1) {
                $pembimbing1->temp_dosbing1 = NULL;
                $pembimbing1->save();
            }
            else if ($pembimbing2) {
                $pembimbing2->temp_dosbing2 = NULL;
                $pembimbing2->save();
            }
            return Redirect::to('/bimbingan')->with('message', 'Berhasil menolak permintaan bimbingan');
        }
        else{
            return Redirect::to('/bimbingan')->withErrors('Menolak penerimaan bimbingan gagal dilakukan');
        }
    }

    public function asistensi(Request $request)
    {
        $asistensi = new Asistensi();
        $asistensi->id_ta = $request->id_ta;
        $asistensi->id_dosen = TugasAkhir::where('id_ta',$request->id_ta)->first()->id_dosbing1;
        $asistensi->tanggal = $request->tanggal;
        $asistensi->materi = $request->materi;
        $asistensi->disetujui = 0;
        if($asistensi->save())
        {
            return Redirect::to('/detailta')->with('message', 'Berhasil Menambahkan data asistensi');
        }
        else
        {
            return Redirect::to('/detailta')->withErrors('Gagal Mengisi Asistensi');
        }
    }

    public function nilaiSeminar(Request $request)
    {
        //dd($request);
        $seminar = SeminarTA::where('id_seminar_ta',$request->id_seminar_ta)->first();
        //dd($seminar);
        $seminar->nilai = $request->nilai;
        $seminar->nilai_angka = $request->nilai_angka;
        $seminar->evaluasi = $request->evaluasi;
        if($seminar->save())
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->with('message', 'Berhasil Menginputkan Nilai Seminar');
        }
        else
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->withErrors('Terjadi Error Ketika Menginputkan Nilai Seminar');
        }
    }

    public function nilaiUjian(Request $request)
    {
        //dd($request);
            $messagesError = [
                'nilai.required' => 'Input nilai penguji harus berupa angka antara 0 - 100',
            ];

            $validator = Validator::make($request->all(), [
                'nilai' => 'numeric|min:0|max:100',
            ], $messagesError);
            if($validator->fails())
            {
                if($request->status=='1' || $request->status=='2') {
                    return Redirect::to('/bimbingan/'.$request->id_ta)->withErrors($validator)->withInput();
                }
                else {
                    return Redirect::to('/detailuji/'.$request->id_ta)->withErrors($validator)->withInput();
                }
            }

        $ujian = UjianTA::where('id_ujian_ta',$request->id_ujian_ta)->first();
        $status = intval($request->status);
        if($request->status=='1') {
            $ujian->nilai_penguji1 = $request->nilai;
        }
        else if($request->status=='2') {
            $ujian->nilai_penguji2 = $request->nilai;
        }
        else if($request->status=='3') {
            $ujian->nilai_penguji3 = $request->nilai;
        }
        else if($request->status=='4') {
            $ujian->nilai_penguji4 = $request->nilai;
        }
        else if($request->status=='5') {
            $ujian->nilai_penguji5 = $request->nilai;
        }
        $flag = 0;
        $nilais = array();
        if(!is_null($ujian->nilai_penguji1)) {
            array_push($nilais,$ujian->nilai_penguji1);
        }
        if(!is_null($ujian->nilai_penguji2)) {
            array_push($nilais,$ujian->nilai_penguji2);
        }
        if(!is_null($ujian->nilai_penguji3)) {
            array_push($nilais,$ujian->nilai_penguji3);
        }
        if(!is_null($ujian->nilai_penguji4)) {
            array_push($nilais,$ujian->nilai_penguji4);
        }
        if(!is_null($ujian->nilai_penguji5)) {
            array_push($nilais,$ujian->nilai_penguji5);
        }
        $nilaiAngka = 0;
        foreach($nilais as $nilai) {
            $nilaiAngka += $nilai * (1/count($nilais));
        }
        $ujian->nilai_angka = $nilaiAngka;
        if($ujian->nilai_angka>=88)
        {
            $ujian->nilai = 'A';
        }
        else if($ujian->nilai_angka>=80)
        {
            $ujian->nilai = 'AB';
        }
        else if($ujian->nilai_angka>=70)
        {
            $ujian->nilai = 'B';
        }
        else if($ujian->nilai_angka>=60)
        {
            $ujian->nilai = 'BC';
        }
        else if($ujian->nilai_angka>=50)
        {
            $ujian->nilai = 'C';
        }
        else
        {
            $ujian->nilai = 'E';
        }
        $ujian->evaluasi = $request->evaluasi;
        if($ujian->save())
        {
            if($request->status == '1' || $request->status == '2') {
                return Redirect::to('/bimbingan/'.$request->id_ta)->with('message', 'Berhasil Menginputkan Nilai Sidang');
            }
            else {
                return Redirect::to('/detailuji/'.$request->id_ta)->with('message', 'Berhasil Menginputkan Nilai Sidang');
            }
        }
        else
        {
            if($request->status == '1' || $request->status == '2') {
                return Redirect::to('/bimbingan/'.$request->id_ta)->withErrors('Terjadi Error Ketika Menginputkan Nilai Sidang');
            }
            else {
                return Redirect::to('/detailuji/'.$request->id_ta)->withErrors('Terjadi Error Ketika Menginputkan Nilai Sidang');
            }
        }
    }

    public function mahasiswaUji(){
        $data['seminars'] = SeminarTA::where([['id_penguji3', '=',session('user')['id_dosen']],['status', '=', 1]])->orWhere([['id_penguji4', '=',session('user')['id_dosen']],['status', '=', 1]])->orWhere([['id_penguji5', '=',session('user')['id_dosen']],['status', '=', 1]])->with('tugasAkhir.user')->paginate(8);
        $data['ujians'] = UjianTA::where([['id_penguji3', '=',session('user')['id_dosen']],['status', '=', 1]])->orWhere([['id_penguji4', '=',session('user')['id_dosen']],['status', '=', 1]])->orWhere([['id_penguji5', '=',session('user')['id_dosen']],['status', '=', 1]])->with('tugasAkhir.user')->paginate(8);

        return view('bimbingan.uji', $data);
    }

    public function detailUji($id_ta){
        $detailta = TugasAkhir::where('id_ta',$id_ta)->with(['user','dosbing1','dosbing2','status','bidang',
            'seminarTA' => function($query){
                $query->with(['penguji1','penguji2','penguji3','penguji4','penguji5','jadwalSeminar']);
            },'ujianTA' => function($query){
                $query->with(['penguji1Ujian','penguji2Ujian','penguji3Ujian','penguji4Ujian','penguji5Ujian','jadwalUjian']);
            }])->first();
        //dd($detailta);
        if($detailta){
            $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
            );

            $tanggalBuat = $detailta->created_at;
            $tahunBuat = date('Y', strtotime($tanggalBuat));
            $bulanBuat = date('m', strtotime($tanggalBuat));
            $intBulanBuat = (int)$bulanBuat;
            //dd($bulanBuat);
            if($intBulanBuat <= 7){
                $tahun1 = $tahunBuat-1;
                $tahun2 = $tahunBuat;
                $dibuat = 'Bulan '.$bulan[$bulanBuat].' Tahun Ajaran '.$tahun1.'/'.$tahun2;
            }
            elseif($intBulanBuat > 7){
                $tahun1 = $tahunBuat;
                $tahun2 = $tahunBuat+1;
                $dibuat = 'Bulan '.$bulan[$bulanBuat].' Tahun Ajaran '.$tahun1.'/'.$tahun2;
            }
            unset($tanggalBuat);
            $tanggalBuat = date_create(date('Y-m-d',strtotime($detailta->created_at)));
            $tanggalSekarang = date_create(date('Y-m-d',time()));
            $jarak = date_diff($tanggalBuat, $tanggalSekarang);
            $jarak = (int) $jarak->format('%m');
            $semester = ($jarak / 6) + 1;

            $data['semester'] = $semester;
            $data['dibuat'] = $dibuat;
            $data['detailta'] = $detailta;
            $data['asistensis'] = Asistensi::where('id_ta',$detailta->id_ta)->with('dosen')->get();
            $data['penguji1'] = NULL;
            $data['penguji2'] = NULL;
            $data['penguji3'] = UjianTA::where([['id_penguji3',session('user')['id_dosen']],['id_ta',$detailta->id_ta]])->first();
            $data['penguji4'] = UjianTA::where([['id_penguji4',session('user')['id_dosen']],['id_ta',$detailta->id_ta]])->first();
            $data['penguji5'] = UjianTA::where([['id_penguji5',session('user')['id_dosen']],['id_ta',$detailta->id_ta]])->first();
            return view('bimbingan.detail_penguji',$data);
        }
        else
        {
            return view('home');
        }
    }

    public function ubahDetail(Request $request){
        //dd($request);
        $ta = TugasAkhir::where('id_ta', $request->id_ta)->first();
        $ta->judul = $request->judulTA;
        $ta->id_bidang_mk = $request->bidangMK;
        if($ta->save())
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->with('message', 'Berhasil Mengubah Data TA');
        }
        else
        {
            return Redirect::to('/bimbingan/'.$request->id_ta)->withErrors('Terjadi Error Ketika Menginputkan Data TA baru');
        }
    }

    public function terimaAsistensi(Request $request) {
        $idAsistensi = $request->idAsistensi;
        $asistensi = Asistensi::where('id_asistensi',$idAsistensi)->first();
        $asistensi->disetujui = 1;
        if($asistensi->save()) {
            return Redirect::to('/bimbingan/'.$request->id_ta)->with('message','Berhasil Menyetujui Asistensi.');
        }
        else {
            return Redirect::to('/bimbingan/'.$request->id_ta)->withErrors('Gagal menyetujui asistensi.');
        }
        
    }

    public function batalkanAsistensi(Request $request) {
        $idAsistensi = $request->idAsistensi;
        $asistensi = Asistensi::where('id_asistensi',$idAsistensi)->first();
        if($asistensi->delete()) {
            return Redirect::to('/bimbingan/'.$request->id_ta)->with('message','Berhasil Membatalkan Asistensi.');
        }
        else {
            return Redirect::to('/bimbingan/'.$request->id_ta)->withErrors('Gagal membatalkan asistensi.');
        }
    }


}
