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
        <div class="form-group alert alert-dismissable alert-warning" style="margin-bottom: 0;">
            <button type="button" class="close fade" data-dismiss="alert">&times;</button>
            <h4>Perhatian</h4>
            <p><strong>Untuk mengajukan asistensi, pastikan Anda mendapat persetujuan dari dosen pembimbing 1 dan dosen pembimbing 2.</strong></p>
        </div>
        
        <div class="panel-body isi-halaman">
            <div class="form-group">
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
                        @elseif($pembimbing1!=null)
                            <h6>{{$pembimbing1->nama_lengkap}} (Mengajukan)</h6>
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
                        @elseif($pembimbing2!=null)
                            <h6>{{$pembimbing2->nama_lengkap}} (Mengajukan)</h6>
                        @else
                            <h6>-</h6>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Bidang Matakuliah</h6></label>
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
                            <h6><a href="{{url(asset('storage/file_ta/'.$detailta->user->username.'_'.$detailta->id_ta.'/'.$detailta->user->username.'_'.$detailta->id_ta.'.pdf'))}}">{{$detailta->user->username.'_'.$detailta->id_ta}}</a></h6>
                        @else
                            <h6>-</h6>
                        @endif
                    </div>
                </div>
                @if($detailta->file)
                    <div class="row">
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#fileUploadModal"><i class="glyphicon glyphicon-file"></i> Update File</button>
                    </div>
                @else
                    <div class="row">
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#fileUploadModal"><i class="glyphicon glyphicon-file"></i> Tambahkan File</button>
                    </div>
                @endif
            </div>
            <hr>
            <div>
                <h4>Progres Asistensi</h4>
                <div class="row">
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
                        @if($asistensis)
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
                @if($detailta->id_dosbing1 && $detailta->id_dosbing2)
                <div class="row">
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#bimbinganModal">Tambahkan Asistensi</button>
                </div>
                @endif
            </div>
            <hr>
            <div class="form-group">
                @if($detailta->seminarTA && $detailta->seminarTA->status == 1)
                    @include('progres.detail.seminar_isi')
                @else
                    @include('progres.detail.seminar_kosong')
                @endif
            </div>
            <hr>
            <div class="form-group">
                @if($detailta->ujianTA && $detailta->ujianTA->status == 1)
                    @include('progres.detail.ujian_isi')
                @else
                    @include('progres.detail.ujian_kosong')
                @endif
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
                                <p>File yang dapat diupload adalah file dengan ekstensi .pdf</p>
                                <p>Pastikan ukuran file yang diupload kurang dari 2MB</p>
                            </div>
                            <input type="text" name="idTA" style="display: none;" value="{{$detailta->id_ta}}">
                            <div class="form-group">
                                <label class="control-label"><h6>Select File</h6></label>
                                <input type="file" name="fileTugasAkhir" class="file col-md-12" style="height: 30px;" accept=".pdf">
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
        <div class="modal fade" id="bimbinganModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                        <h4 class="modal-title" style="color: #ffffff;">Tambahkan Data Asistensi</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{url('/bimbingan/asistensi')}}">
                            <div class="form-group" style="display: none;">
                                <label class="col-md-2 control-label">ID TA</label>
                                <div class="col-md-10">
                                    <input type="text" name="id_ta" class="form-control" value="{{$detailta->id_ta}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tanggal</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Materi</label>
                                <div class="col-md-10">
                                    <textarea type="text" name="materi" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                {{csrf_field()}}
                                {{method_field('POST')}}
                                <button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;" >Simpan</button>
                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection


