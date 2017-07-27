@extends('layout.main')

@section('title')
Home
@endsection

@section('moreStyle')

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
                    @if(Session('user')['role'] == 3)
                        <a href="{{url('/home/'.$berita->id_berita.'/delete')}}" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-eye-open"></i> Hapus Berita</a>
                        <a href="{{url('/home/'.$berita->id_berita.'/edit')}}" class="btn btn-info pull-right"><i class="glyphicon glyphicon-eye-open"></i> Edit Berita</a>
                    @endif
                    <a href="{{url('/home/'.$berita->id_berita)}}" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-eye-open"></i> Lihat Selengkapnya</a>
                    <br>
                    <br>
                    <hr class="berita">
                </div>
            @endforeach
        @endif
	</div>	
@endsection

@section('moreScript')

@endsection

