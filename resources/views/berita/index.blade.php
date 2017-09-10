@extends('layout.main')

@section('title')
Home
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
            <h4><strong>Berita</strong></h4>
            <hr>
        </div>
        @if($beritas!= null)
            @foreach($beritas as $key => $berita)
                <div class="berita">
                    <h5>{{$berita->judul_berita}}</h5>
                    <p class="text-warning">{{$berita->uploader->nama}},
                    @if(date('D',strtotime($berita->created_at)) == 'Sun')
                            {{' Minggu '}}
                        @elseif(date('D',strtotime($berita->created_at)) == 'Mon')
                            {{' Senin '}}
                        @elseif(date('D',strtotime($berita->created_at)) == 'Tue')
                            {{' Selasa '}}
                        @elseif(date('D',strtotime($berita->created_at)) == 'Wed')
                            {{' Rabu '}}
                        @elseif(date('D',strtotime($berita->created_at)) == 'Thu')
                            {{' Kamis '}}
                        @elseif(date('D',strtotime($berita->created_at)) == 'Fri')
                            {{' Jumat '}}
                        @elseif(date('D',strtotime($berita->created_at)) == 'Sat')
                            {{' Sabtu '}}
                    @endif{{$berita->created_at->format('d-m-Y')}} pukul {{$berita->created_at->format('H:i:s')}} WIB</p>
                    <div class="berita-singkat">
                        <p>{!! str_limit($berita->isi_berita,50) !!}</p>
                    </div>
                    <div class="pull-right">
                        @if(Session('user')['role'] != 3)
                            <a href="{{url('/berita/'.$berita->id_berita)}}" class="btn btn-warning" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Selengkapnya</a>
                        @else
                            <a href="{{url('/home/'.$berita->id_berita)}}" class="btn btn-warning" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Selengkapnya</a>
                        @endif

                        @if(Session('user')['role'] == 3)
                            <a href="{{url('/home/'.$berita->id_berita.'/edit')}}" class="btn btn-info" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                            <button class="btn btn-danger" style="margin-left: 10px;margin-right: 10px;" value="{{$berita->id_berita}}"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                        @endif
                    </div>
                    <br>
                    <br>
                    <hr class="berita">
                </div>
            @endforeach
        @endif
	</div>
    <form id="hapusBerita" method="POST" action="{{url('/hapusberita')}}" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" id="inpHapusBerita" name="idBerita">
    </form>	
@endsection

@section('moreScript')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-danger').click( function(){
            var idBerita = $(this).attr('value');
            console.log(idBerita);
            swal({
                title: "Perhatian",
                text: "Apakah anda yakin untuk menghapus berita ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Konfirmasi",
                cancelButtonText: "Batal"
            },
            function(){
                $('#inpHapusBerita').val(idBerita);
                $('#hapusBerita').submit();
            });
        });
    });
</script>
@endsection

