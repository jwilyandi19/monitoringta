@extends('layout.main')

@section('title')
    Pengajuan Jadwal Seminar
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
        <div class="alert alert-dismissable alert-success">
           <button type="button" class="close fade" data-dismiss="alert">&times;</button>
           {{Session::get('message')}}
        </div>
    @endif
	<div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
		<div class="judul-halaman">
            <h4><strong>Pengajuan Jadwal Seminar</strong></h4>
            <hr>
        </div>
        <div class="">
            <div class="">
                <h6>Anda sudah mengajukan jadwal seminar pada hari {{$hari}} tanggal {{$jadwal->tanggal}} sesi {{$jadwal->sesi}}.</h6>
                <br>
                <h6>Berikut daftar TA yang juga mendaftar dapa jadwal ini :</h6>
            </div>
            <div class="">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Judul TA</th>
                    </thead>
                    <tbody>
                        @if($seminars)
                            @foreach($seminars as $keys => $seminar)
                                @if($keys < 3)
                                    <tr class="warning">
                                @else
                                    <tr>
                                @endif
                                    <td>{{$keys+1}}</td>
                                    <td>{{$seminar->tugasAkhir->user->username}}</td>
                                    <td>{{$seminar->tugasAkhir->user->nama}}</td>
                                    <td>{{$seminar->tugasAkhir->judul}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <hr style="">
            <div class="">
                <form method="POST" class="form-horizontal" action="{{url('/pengajuanseminar')}}">
                    <div class="center" style="text-align: center;">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <a href="{{url('/pengajuanseminar')}}" class="btn btn-default" style="margin: 0px 10px;">Kembali</a>
                        <button type="submit" class="btn btn-primary" style="margin: 0px 10px;"><i class="glyphicon glyphicon-plus"></i> Batalkan Pengajuan Jadwal</button>
                    </div>
                </form>
            </div>
            <br>
        </div>
	</div>	
@endsection

@section('moreScript')
@endsection

