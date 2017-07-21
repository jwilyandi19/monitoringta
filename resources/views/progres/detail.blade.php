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
                            <th>Dosen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($asistensis) != 0)
                            @foreach($asistensis as $key => $asistensi)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$asistensi->tanggal}}</td>
                                    <td>{{$asistensi->materi}}</td>
                                    <td>{{$asistensi->dosen->nama_lengkap}}</td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>
            <div class="form-group">
                <div>
                    <h4>Seminar Tugas Akhir</h4>
                </div>
                <div class="col-md-12">
                    <label class="col-md-2"><h6 class="pull-left">Nilai</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>

                    </div>
                    <div class="col-md-9">
                        @if($detailta->seminarTA == null)
                            <h6>-</h6>
                        @else
                            <h6>{{$detailta->seminarTA->nilai}}</h6>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->seminarTA == null)
                            <h6>-</h6>
                        @else
                            <h6>{{$detailta->seminarTA->evaluasi}}</h6>
                        @endif
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <hr>
            <div class="form-control">
                <div>
                    <h4>Sidang Tugas Akhir</h4>
                </div>
                <div class="col-md-12">
                    <label class="col-md-2"><h6 class="pull-left">Nilai</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->ujianTA == null)
                            <h6>-</h6>
                        @else
                            <h6>{{$detailta->ujianTA->nilai}}</h6>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->ujianTA == null)
                            <h6>-</h6>
                        @else
                            <h6>{{$detailta->ujianTA->evaluasi}}</h6>
                        @endif
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>

    <div class="modal fade" id="fileUploadModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ffffff;">&times;</button>
                    <h4 class="modal-title" style="color: #ffffff;"> Upload File Tugas Akhir</h4>
                </div>
                <div class="modal-body panel panel-body" style="margin-bottom: 0px; padding: 30px;">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/progres/uploadfile')}}" style="padding: 0px 20px;">
                        <div class="form-group alert alert-warning">
                            <h4>Perhatian</h4>
                            <p>File yag dapat diupload adalah file dengan ekstensi .zip</p>
                        </div>
                        <input type="text" name="idTA" style="display: none;" value="{{$detailta->id_ta}}">
                        <div class="form-group">
                            <label class="control-label"><h6>Select File</h6></label>
                            <input type="file" name="fileTugasAkhir" class="file col-md-12" style="height: 30px;" accept=".zip">
                        </div>
                        <br>
                        <hr style="border-top: 1px solid #24292e;">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <div class="form-group" style="height: 30px;">
                            <button type="submit" class="btn btn-primary pull-right">Tambahkan File</button>
                            <button class="btn btn-default pull-right" style="margin-right: 10px;" data-dismiss="modal">Batal</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection

