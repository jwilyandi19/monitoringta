@extends('layout.main')

@section('title')
    Mahasiswa Uji
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
            <h4><strong>Mahasiswa Bimbingan</strong></h4>
            <hr>
        </div>
        <div class="mahasiswa-bimbingan">
            <h5><strong>List Mahasiswa Uji Seminar</strong></h5>
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
                    @if($seminars)
                        @foreach($seminars as $key => $seminar)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$seminar->tugasAkhir->user->username}}</td>
                                <td>{{$seminar->tugasAkhir->user->nama}}</td>
                                <td>{{$seminar->tugasAkhir->judul}}</td>
                                @if($seminar->id_penguji1 == session('user')['id_dosen'])
                                    <td class="text-center">Penguji 1</th>
                                @elseif($seminar->id_penguji2 == session('user')['id_dosen'])
                                    <td class="text-center">Penguji 2</th>
                                @else
                                    <td class="text-center">Penguji 3</td>
                                @endif
                                <td class="text-center"><a href="{{url('/detailuji/'.$seminar->tugasAkhir->id_ta)}}" class="btn btn-info btn-sm">Detail TA</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>            
        </div>
        <div class="text-right">
            {{$seminars->links()}}
        </div>
        <br>
        <hr style="border-top : 1px solid #24292e;">
        <div class="mahasiswa-bimbingan">
            <h5><strong>List Mahasiswa Uji Sidang</strong></h5>
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
                    @if($ujians)
                        @foreach($ujians as $key => $ujian)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$ujian->tugasAkhir->user->username}}</td>
                                <td>{{$ujian->tugasAkhir->user->nama}}</td>
                                <td>{{$ujian->tugasAkhir->judul}}</td>
                                @if($ujian->id_penguji1 == session('user')['id_dosen'])
                                    <td class="text-center">Penguji 1</th>
                                @elseif($ujian->id_penguji2 == session('user')['id_dosen'])
                                    <td class="text-center">Penguji 2</th>
                                @else
                                    <td class="text-center">Penguji 3</td>
                                @endif
                                <td class="text-center"><a href="{{url('/detailuji/'.$ujian->tugasAkhir->id_ta)}}" class="btn btn-info btn-sm">Detail TA</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="text-right">
            {{$ujians->links()}}
        </div>
	</div>
@endsection

@section('moreScript')
@endsection

