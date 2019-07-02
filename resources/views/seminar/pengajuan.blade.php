@extends('layout.main')

@section('title')
    Pengajuan Jadwal Seminar
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
            <h4><strong>Pengajuan Jadwal Seminar</strong></h4>
            <hr>
        </div>
        @if($seminarTA)
            <div class="">
                <div class="">
                    @if($seminarTA->status == 1)
                        <h6>Pengajuan jadwal seminar anda sudah disetujui pada hari {{$hari}} tanggal {{$jadwalTerdaftar->tanggal}} sesi {{$jadwalTerdaftar->sesi}}.</h6>
                    @elseif($seminarTA->status == 0)
                        <h6>Anda sudah mengajukan jadwal seminar pada hari {{$hari}} tanggal {{$jadwalTerdaftar->tanggal}} sesi {{$jadwalTerdaftar->sesi}}.</h6>
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
                            @if($seminars)
                                @foreach($seminars as $keys => $seminar)
                                    @if($seminar->status == 1)
                                        <tr class="success">
                                    @elseif($keys < 3)
                                        <tr class="warning">
                                    @else
                                        <tr>
                                    @endif
                                        <td>{{$keys+1}}</td>
                                        <td>{{$seminar->tugasAkhir->user->username}}</td>
                                        <td>{{$seminar->tugasAkhir->user->nama}}</td>
                                        <td>{{$seminar->tugasAkhir->judul}}</td>
                                        <td>{{$seminar->created_at}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @if($seminarTA->status == 0)
                    <div class="center" style="text-align: center;">
                        <button class="btn btn-danger" value="{{$seminarTA->id_seminar_ta}}"><i class="glyphicon glyphicon-trash"></i> Batalkan Pengajuan Jadwal Seminar</button>
                    </div>
                @endif
            </div>
            <hr>
        @endif
        <div class="alert alert-info">
            <h4>Perhatian</h4>
            <p>Berikut merupakan jadwal seminar yang tersedia, dengan menekan tombol sesi anda akan diarahkan pada form pengajuan jadwal dari sesi dan tanggal yang anda pilih.</p>
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
            <div class="" style="height: <?php echo 170*((int)(count($tanggalSeminars)/5) + 1)?>px; width: 100%;">
                @foreach($tanggalSeminars as $key => $tanggalSeminar)
                    <div class="kotak-tanggal">
                        <div class="panel tanggal">
                            <p><strong>{{$tanggalSeminar['hari'].", ".$tanggalSeminar['tanggal']}}</strong></p>
                        </div>
                        <div class="panel sesi-tanggal">
                            @foreach($tanggalSeminar['sesi'] as $key => $sesi)
                                @if((isset($ketersediaanDosen[$tanggalSeminar['tanggal']][$key][1]) && $ketersediaanDosen[$tanggalSeminar['tanggal']][$key][1] == 1) && (isset($ketersediaanDosen[$tanggalSeminar['tanggal']][$key][2]) && $ketersediaanDosen[$tanggalSeminar['tanggal']][$key][2] == 1))
                                    <a href="{{url('/formpengajuanseminar/'.$sesi)}}" class="btn btn-default btn-xs btn-block sesi sesi-success"><p>sesi {{$key}}</p></a>
                                @elseif((isset($ketersediaanDosen[$tanggalSeminar['tanggal']][$key][1]) && $ketersediaanDosen[$tanggalSeminar['tanggal']][$key][1] == 1) || (isset($ketersediaanDosen[$tanggalSeminar['tanggal']][$key][2]) && $ketersediaanDosen[$tanggalSeminar['tanggal']][$key][2] == 1))
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
    </div>  
    <form id="batalkanPengajuan" action="{{url('/batalkanpengajuanseminar')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        @if($seminarTA)
            <input type="text" name="idSeminar" value="{{$seminarTA->id_seminar_ta}}">
        @endif
    </form>
@endsection

@section('moreScript')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click', '.btn-danger', function(){
        swal({
            title: "Perhatian",
            text: "Apakah anda yakin ingin membatalkan pengajuan jadwal seminar ?",
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

