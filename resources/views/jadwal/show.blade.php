@extends('layout.main')

@section('title')
    Detail Jadwal
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
            <h4><strong>Detail Data Jadwal</strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <div >
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama Jadwal</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$jadwal->nama}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Tanggal</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$jadwal->tanggal}}</h6>
                    </div>
                </div>
                <br>
            </div>
            <div class="form-group">
                <div class="pull-right">
                    <a class="btn btn-default" href="{{url('/jadwal')}}" style="margin-right: 20px;"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali </a>
                    <a class="btn btn-info" href="{{url('/jadwal/'.$jadwal->id_jadwal.'/edit')}}"><i class="glyphicon glyphicon-edit"></i> Edit Jadwal</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection

