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
                <div class="alert alert-warning">
                    <h4>Perhatian</h4>
                    <p><strong>Anda belum pernah mengupload file proposal</strong></p>
                    @if($asistensis==null)
                        <p><strong>Anda belum pernah melakukan bimbingan</strong></p>
                    @endif
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">NRP</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$detailta->user->username}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$detailta->user->nama}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Judul Tugas Akhir</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$detailta->judul}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 1</h6></label>
                    <div class="col-md-10">
                        @if($detailta->id_dosbing1!=null)
                            <h6>: {{$detailta->dosbing1->nama_lengkap}}</h6>
                        @else
                            <h6>: -</h6>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 2</h6></label>
                    <div class="col-md-10">
                        @if($detailta->id_dosbing2!=null)
                            <h6>: {{$detailta->dosbing2->nama_lengkap}}</h6>
                        @else
                            <h6>: -</h6>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">RMK</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$detailta->bidang->nama_bidang}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Status</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$detailta->status->keterangan}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">File Proposal</h6></label>
                    <div class="col-md-10">
                        <h6>: -</h6>
                    </div>
                </div>
                <button class="btn btn-primary pull-right">Tambahkan File</button>
                <br>
            </div>
            <br>
            <hr>
            <div>
                <h4>Progres Asistensi</h4>
                <div class="">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Materi Asistensi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($asistensis)
                            @foreach($asistensis as $key => $asistensi)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$asistensi->tanggal}}</td>
                                    <td>{{$asistensi->materi}}</td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>
            <div>
                <h4>Seminar Tugas Akhir</h4>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Nilai</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <hr>
            <div>
                <h4>Sidang Tugas Akhir</h4>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Nilai</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <br>

        </div>
    </div>
@endsection

@section('moreScript')

@endsection

