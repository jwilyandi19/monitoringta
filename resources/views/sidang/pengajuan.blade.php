@extends('layout.main')

@section('title')
    Pengajuan Jadwal Sidang
@endsection

@section('moreStyle')
<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
@endsection

@section('content')
    @if ($errors->count()>0)
        <div class="alert alert-dismissable alert-danger" >
            <button type="button" class="close fade" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (Session::get('message'))
        <div class="alert alert-dismissable alert-success"> <!-- style="color:white; background-color: green; font-weight:bold; padding: 0.5em" -->
           <button type="button" class="close fade" data-dismiss="alert">&times;</button>
           {{Session::get('message')}}
        </div>
    @endif
    <div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
        <div class="judul-halaman">
            <h4><strong>Pengajuan Jadwal Sidang</strong></h4>
            <hr>
        </div>
        @if($ujianTA)
            <div class="">
                <div class="">
                    @if($ujianTA->status == 1)
                        <h6>Pengajuan jadwal sidang anda sudah disetujui pada hari {{$hari}} tanggal {{$jadwalTerdaftar->tanggal}} ruang {{$jadwalTerdaftar->ruang}} sesi {{$jadwalTerdaftar->sesi}}.</h6>
                    @elseif($ujianTA->status == 0)
                        <h6>Anda sudah mengajukan jadwal sidang pada hari {{$hari}} tanggal {{$jadwalTerdaftar->tanggal}} ruang {{$jadwalTerdaftar->ruang}} sesi {{$jadwalTerdaftar->sesi}}.</h6>
                    @endif
                    <h6>Berikut daftar TA yang juga mendaftar pada jadwal ini :</h6>
                </div>
                <div class="">
                    <table class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th class="col-md-1">NRP</th>
                            <th class="col-md-1">Nama</th>
                            <th class="col-md-8">Judul TA</th>
                            <th class="col-md-2">Waktu Pengajuan</th>
                        </thead>
                        <tbody>
                            @if($ujians)
                                @foreach($ujians as $keys => $ujian)
                                    @if($ujian->status == 1)
                                        <tr class="success">
                                    @elseif($keys < 3)
                                        <tr class="warning">
                                    @else
                                        <tr>
                                    @endif
                                        <td>{{$keys+1}}</td>
                                        <td>{{$ujian->tugasAkhir->user->username}}</td>
                                        <td>{{$ujian->tugasAkhir->user->nama}}</td>
                                        <td>{{$ujian->tugasAkhir->judul}}</td>
                                        <td>{{$ujian->created_at}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
        @endif
        @if(!$ujianTA)
        <div class="alert alert-info">
            <h4>Perhatian</h4>
            <p>Berikut merupakan jadwal sidang yang tersedia, dengan menekan tombol sesi anda akan diarahkan pada form pengajuan jadwal dari sesi dan tanggal yang anda pilih.</p>
            <p>Anda hanya dapat memilih jadwal dimana kedua dosen pembimbing anda bersedia.</p>
            <p>Berikut merupakan keterangan dari warna tombol sesi setiap jadwal :</p>
            <br>
            <div class="center row" style="text-align: center;">
                <div class="col-md-12" style="margin: 5px 0px;">
                    <button class="col-md-offset-3 col-md-6 btn btn-default btn-xs sesi sesi-success"><p>2 dosen pembimbing bersedia</p></button>
                </div>
                <div class="col-md-12" style="margin: 5px 0px;">
                    <button class="col-md-offset-3 col-md-6 btn btn-default btn-xs sesi sesi-warning"><p>1 dosen pembimbing bersedia</p></button>
                </div>
                <div class="col-md-12" style="margin: 5px 0px;">
                    <button class="col-md-offset-3 col-md-6 btn btn-default btn-xs sesi"><p>Tidak ada dosen pembimbing yang bersedia</p></button>
                </div>
            </div>
        </div>
        <div class="">
            <div class="" style="height: <?php echo 170*((int)(count($tanggalUjians)/5) + 1)?>px; width: 100%;">
                @foreach($tanggalUjians as $key => $tanggalUjian)
                    <div class="kotak-tanggal">
                        <div class="panel tanggal">
                            <p><strong>{{$tanggalUjian['hari'].", ".$tanggalUjian['tanggal']}} (Ruang {{$tanggalUjian['ruang']}})</strong></p>
                        </div>
                        <div class="panel sesi-tanggal">
                            @foreach($tanggalUjian['sesi'] as $key => $sesi)
                                @if((isset($ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][1]) && $ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][1] == 1) && (isset($ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][2]) && $ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][2] == 1))
                                    <a href="{{url('/formpengajuanujian/'.$sesi)}}" class="btn btn-default btn-xs btn-block sesi sesi-success"><p>sesi {{$key}}</p></a>
                                @elseif((isset($ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][1]) && $ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][1] == 1) || (isset($ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][2]) && $ketersediaanDosen[$tanggalUjian['tanggal']][$tanggalUjian['ruang']][$key][2] == 1))
                                    <button id="tombolBersedia" class="btn btn-default btn-xs btn-block sesi sesi-warning"><p>sesi {{$key}}</p></button>
                                @else
                                    <button id="tidakBersedia" class="btn btn-default btn-xs btn-block sesi" value="{{$sesi}}"><p>sesi {{$key}}</p></button>
                                @endif
                            @endforeach
                        </div>   
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>  
    <form id="batalkanPengajuan" action="{{url('/batalkanpengajuanujian')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        @if($ujianTA)
            <input type="text" name="idUjian" value="{{$ujianTA->id_ujian_ta}}">
        @endif
    </form>
@endsection

@section('moreScript')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click', '.btn-danger', function(){
        swal({
            title: "Perhatian",
            text: "Apakah anda yakin ingin membatalkan pengajuan jadwal sidang ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Batalkan",
            cancelButtonText: "Batal"
        },
        function(){
            $('#batalkanPengajuan').submit();
        });
    });
</script>
@endsection

