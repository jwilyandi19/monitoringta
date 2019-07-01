<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Dosen;
use App\User;
use App\TugasAkhir;
use App\BidangMK;
use App\Asistensi;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x = session('user')['id'];
        $data['users'] = User::where('id_user','!=',$x)->orderBy('id_user')->get();
        return view('user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'username.required' => 'Username tidak boleh kosong.',
            'role.required' => 'Peran tidak boleh kosong.',
            'nama.required' => 'Nama tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'role' => 'required',
            'nama' => 'required',
        ], $messagesError);

        if($validator->fails())
        {
            return Redirect::to('/user/create')->withErrors($validator)->withInput();
        }
        else
        {
            $user = User::where('username','=',$request->username)->first();
           // dd($user);
            if($user!=null)
            {
                return Redirect::to('/user/create')->withErrors('User dengan Username '.$request->username.' Sudah ada');
            }
            else
            {
                $user = new User();
                $user->username = $request->username;
                $user->password = bcrypt($request->username);
                $user->role = $request->role;
                $user->nama = $request->nama;
                if($request->role == 2)
                {
                    if($user->save())
                    {
                        $get = User::where('username',$request->username)->first();
                        //dd($get);
                        $dosen = new Dosen();
                        $dosen->id_user = $get->id_user;
                        $dosen->nip = $request->username;
                        $dosen->nama = $request->nama;
                        $dosen->nama_lengkap = $request->nama;
                        if($dosen->save())
                        {
                            return Redirect::to('/user/create')->with('message','Berhasil Membuat User '.$request->username);
                        }
                        else
                        {
                            return Redirect::to('/user/create')->withErrors('Terdapat kesalahan pada server ketika membuat User '.$request->username);
                        }

                    }
                    else
                    {
                        return Redirect::to('/user/create')->withErrors('Gagal membuat User '.$request->username);
                    }
                }
                else
                {
                    if($user->save())
                    {
                        return Redirect::to('/user/create')->with('message','Berhasil Membuat User '.$request->username);
                    }
                    else
                    {
                        return Redirect::to('/user/create')->withErrors('Gagal membuat User '.$request->username);
                    }
                }

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
        $user = User::where('id_user',$id)->first();
        //dd($user);
        if($user!=null)
        {
            if($user->role == 2)
            {
                $data['user'] = User::where('id_user',$id)->with('akunDosen')->first();
            }
            else
            {
                $data['user'] = $user;
            }
            //dd($data);
            return view('user.show',$data);
        }
        else
        {
            return Redirect::to('/user')->withErrors('User Tidak Ditemukan');
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
        $user = User::where('id_user',$id)->first();
        if($user->role == 2)
        {
            $data['user'] = User::where('id_user',$id)->with('akunDosen')->first();
            dd($data['user']);
            return view('user.edit',$data);
        }
        else
        {
            $data['user'] = $user;
            return view('user.edit',$data);
        }
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
       if($request->nama_lengkap!= null) {
           $dosen = Dosen::where('id_user', $id)->first();
           $dosen->nip = $request->username;
           $dosen->nama = $request->nama;
           $dosen->nama_lengkap = $request->nama_lengkap;
           if(!$dosen->save())
           {
               return Redirect::to('/user/'.$id)->withErrors('Gagal Melakukan Update');
           }
       }
       $user = User::where('id_user',$id)->first();
       $user->username = $request->username;
       $user->password = bcrypt($request->username);
       $user->nama = $request->nama;
       if(!$user->save())
       {
           return Redirect::to('/user/'.$id)->withErrors('Gagal Melakukan Update');
       }
       else
       {
           return Redirect::to('/user/'.$id)->with('message','Berhasil Melakukan Update');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id_user',$id)->get();
        if(User::where('id_user',$id)->delete())
        {
            if($user->role==2) {
                Dosen::where('id_user',$id)->delete();
            }
            
            return Redirect::to('/user')->with('message','Berhasil Menghapus user '.$id);
        }
        else
        {
            return Redirect::to('/user')->withErrors('User Tidak Ditemukan');
        }
    }

    public function uploadFile(Request $request){
        if($request->hasFile('fileUser') && $request->file('fileUser')->isValid()){
            $file = $request->fileUser;
            $path = 'public/generate_user';
            $flag = $request->fileUser->storeAs($path, $file->getClientOriginalName());
            if($flag){
                $storagePath = storage_path('app/'.$flag);
                $handle = fopen($storagePath, "r");
                while(($data = fgetcsv($handle)) !== FALSE){
                    $username = $data[1];
                    $nama = $data[2];
                    $user = User::where('username', $username)->first();
                    if($user){
                        echo "onok bos"."\n";
                        continue;
                    }
                    else{
                        $user = new User();
                        $user->username = $username;
                        $user->password = bcrypt($username);
                        $user->nama = $nama;

                        if(strlen($username)==18) {
                            $user->role = 2;
                            $user->save();
                            $get = User::where('username',$username)->first();
                            //dd($get);
                            $dosen = new Dosen();
                            $dosen->id_user = $get->id_user;
                            $dosen->nip = $username;
                            $dosen->nama = $data[3];
                            $dosen->pembimbing1 = $data[4];
                            $dosen->nama_lengkap  = $nama;
                            $dosen->save();
                        }
                        else {
                            $user->role = 1;
                            $user->save();
                        }
                        unset($user);
                    }
                    unset($user);
                }
                return Redirect::to('/user/create')->with('message', 'Berhasil upload file csv dan generate user baru');
            }
            else{
                return Redirect::to('/user/create')->withErrors('Gagal generate user, terjadi kesalahan dalam proses upload file, silahkan coba lagi');
            }
        }
        else{
            return Redirect::to('/user/create')->withErrors('Gagal generate user, terjadi kesalahan dalam proses upload file, silahkan coba lagi');
        }
    }

    public function resetPassword(Request $request){
        $user = User::where('id_user', $request->idUser)->first();
        $password = $user->username;
        $user->password = bcrypt($password);
        if($user->save()){
            return Redirect::to('/user')->with('message','Password berhasil direset');
        }
        else{
            return Redirect::to('/user')->withErrors('Gagal mereset password user, coba lagi');
        }
    }

    public function indexManajemen(){
        $data['tugasAkhirs'] = TugasAkhir::where([['id_status', '>=', '0'], ['id_status', '<=', '5']])->with(['user', 'seminarTA', 'ujianTA'])->orderBy('id_status', 'desc')->latest()->get();
        //dd($data);
        return view('user.manajementa', $data);
    }

    public function tidakLulus(Request $request){
        $tugasAkhir = TugasAkhir::where('id_ta', $request->idTA)->with(['seminarTA', 'ujianTA'])->first();
        $tugasAkhir->id_status = 7;
        if($tugasAkhir->seminarTA){
            $tugasAkhir->seminarTA->status = 2;
        }
        if($tugasAkhir->ujianTA){
            $tugasAkhir->ujianTA->status = 2;
        }
        //dd($tugasAkhir);
        if($tugasAkhir->save() && $tugasAkhir->seminarTA->save() && $tugasAkhir->ujianTA->save()){
            return Redirect::to('/manajementa')->with('message', 'Berhasil menyatakan bahwa TA tidak lulus');
        }
        else{
            return Redirect::to('/manajementa')->withError('Gagal menyimpan data ta tidak lulus');
        }
    }

    public function dinyatakanLulus(Request $request){
        $tugasAkhir = TugasAkhir::where('id_ta', $request->idTA)->with(['seminarTA', 'ujianTA'])->first();
        $tugasAkhir->id_status = 6;
        if($tugasAkhir->seminarTA){
            $tugasAkhir->seminarTA->status = 2;
        }
        if($tugasAkhir->ujianTA){
            $tugasAkhir->ujianTA->status = 2;
        }
        //dd($tugasAkhir);
        if($tugasAkhir->save() && $tugasAkhir->seminarTA->save() && $tugasAkhir->ujianTA->save()){
            return Redirect::to('/manajementa')->with('message', 'Berhasil menyatakan bahwa TA lulus');
        }
        else{
            return Redirect::to('/manajementa')->withError('Gagal menyimpan data ta tidak lulus');
        }
    }

    public function detailTA($id_ta){
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
            $data['bidang_mks'] = BidangMK::all();
            $data['asistensis'] = Asistensi::where('id_ta',$detailta->id_ta)->with('dosen')->get();
            return view('user.detail_koordinator',$data);
        }
        else
        {
            return view('home');
        }
    }
}
