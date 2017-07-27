@extends('layout.main')

@section('title')
    Detail Tugas Akhir
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
            <h4><strong>Detail Progres Tugas Akhir </strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <div >
                @if(!$detailta->file || count($asistensis) == 0)
                    <div class="alert alert-warning">
                        <h4>Perhatian</h4>
                        @if(!$detailta->file)
                            <p><strong>Anda belum pernah mengupload file proposal</strong></p>
                        @endif
                        @if(count($asistensis) == 0)
                            <p><strong>Anda belum pernah melakukan bimbingan</strong></p>
                        @endif
                    </div>
                @endif
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">NRP</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->user->username}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->user->nama}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Judul Tugas Akhir</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->judul}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 1</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->id_dosbing1!=null)
                            <h6>{{$detailta->dosbing1->nama_lengkap}}</h6>
                        @else
                            <h6>-</h6>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 2</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->id_dosbing2!=null)
                            <h6>{{$detailta->dosbing2->nama_lengkap}}</h6>
                        @else
                            <h6>-</h6>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">RMK</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->bidang->nama_bidang}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Status</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->status->keterangan}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">File Proposal</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->file)
                            <h6><a href="{{url(asset('storage/file_ta/'.$detailta->user->username.'_'.$detailta->id_ta.'/'.$detailta->user->username.'_'.$detailta->id_ta.'.zip'))}}">{{$detailta->user->username.'_'.$detailta->id_ta}}</a></h6>
                        @else
                            <h6>-</h6>
                        @endif
                    </div>
                </div>
                @if($detailta->file)
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#fileUploadModal"><i class="glyphicon glyphicon-file"></i> Update File</button>
                @else
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#fileUploadModal"><i class="glyphicon glyphicon-file"></i> Tambahkan File</button>
                @endif
                <br>
            </div>


        </div>
    </div>


@endsection

@section('moreScript')

@endsection

