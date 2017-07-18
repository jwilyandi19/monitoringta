@extends('layout.main')

@section('title')
Mahasiswa Bimbingan
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
            <h4><strong>Mahasiswa Bimbingan</strong></h4>
            <hr>
        </div>
        <div class="konfirmasi">
            <h5><strong>Konfirmasi Mahasiswa Bimbingan</strong></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >No</th>
                        <th class="col-md-1">NRP</th>
                        <th class="col-md-1">Nama</th>
                        <th class="col-md-7">Judul TA</th>
                        <th class="col-md-1 text-center">Sebagai</th>
                        <th class="col-md-1 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($konfirmasis)
                        @foreach($konfirmasis as $key => $konfirmasi)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$konfirmasi->tugasAkhir->user->username}}</td>
                                <td>{{$konfirmasi->tugasAkhir->user->nama}}</td>
                                <td>{{$konfirmasi->tugasAkhir->judul}}</td>
                                <td class="text-center">Pembimbing {{$konfirmasi->peran}}</th>
                                <td>
                                    <div class="text-center">
                                        <button value="{{$konfirmasi->tugasAkhir->id_ta}}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i></button>
                                        <button value="{{$konfirmasi->tugasAkhir->id_ta}}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-ban-circle"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <br>
        <hr style="border-top : 1px solid #24292e;">
        <div class="mahasiswa-bimbingan">
            <h5><strong>List Mahasiswa Bimbingan</strong></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >No</th>
                        <th class="col-md-1">NRP</th>
                        <th class="col-md-1">Nama</th>
                        <th class="col-md-7">Judul TA</th>
                        <th class="col-md-1 text-center">Sebagai</th>
                        <th class="col-md-1 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($bimbingans)
                        @foreach($bimbingans as $key => $bimbingan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bimbingan->user->username}}</td>
                                <td>{{$bimbingan->user->nama}}</td>
                                <td>{{$bimbingan->judul}}</td>
                                @if($bimbingan->id_dosbing1 == session('user')['id_dosen'])
                                    <td class="text-center">Pembimbing 1</th>
                                @else
                                    <td class="text-center">Pembimbing 2</th>
                                @endif
                                <td class="text-center"><a href="detailta2" class="btn btn-info btn-sm">Detail TA</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            
        </div>
        <div class="text-right">
                {{$bimbingans->links()}}
            </div>
	</div>
    <form id="tolak-permintaan" action="{{url('/bimbingan/tolaktugasakhir')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idTugasAkhir" id="inp-taDitolak">
    </form>
    <form id="konfirmasi-permintaan" action="{{url('/bimbingan/konfirmasitugasakhir')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idTugasAkhir" id="inp-taDikonfirmasi">
    </form>	
@endsection

@section('moreScript')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click', '.btn-success', function(){
        var idTugasAkhir = $(this).attr('value');
        console.log(idTugasAkhir);

        swal({
            title: "Perhatian",
            text: "Apakah anda yakin ingin menerima permintaan bimbingan dari TA berikut ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, konfirmasi",
            cancelButtonText: "Batal"
        },
        function(){
            $('#inp-taDikonfirmasi').val(idTugasAkhir);
            $('#konfirmasi-permintaan').submit();
        });
    });
    $(document).on('click', '.btn-danger', function(){
        var idTugasAkhir = $(this).attr('value');
        console.log(idTugasAkhir);

        swal({
            title: "Perhatian",
            text: "Apakah anda yakin ingin menolak permintaan bimbingan dari TA berikut ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, tolak",
            cancelButtonText: "Batal"
        },
        function(){
            $('#inp-taDitolak').val(idTugasAkhir);
            $('#tolak-permintaan').submit();
        });
    });
</script>
@endsection

