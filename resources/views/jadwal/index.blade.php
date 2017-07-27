@extends('layout.main')

@section('title')
    Jadwal
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
            <h4><strong>List Jadwal Aplikasi</strong></h4>
            <hr>
        </div>
        <div class="data-user">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center"><strong>No.</strong></th>
                    <th><strong>Nama Jadwal</strong></th>
                    <th class="text-center"><strong>Tanggal</strong></th>
                    <th class="text-center"><strong>Aksi</strong></th>
                </tr>
                </thead>
                <tbody>
                @if($jadwals)
                    @foreach($jadwals as $key => $jadwal)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td>{{$jadwal->nama}}</td>
                            <td class="text-center">{{date('d-m-Y H:i:s',strtotime($jadwal->tanggal))}}</td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="{{url('/jadwal/'.$jadwal->id_jadwal)}}">Detail</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('moreScript')

@endsection