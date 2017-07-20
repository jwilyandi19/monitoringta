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
            <h4><strong>Pengajuan Judul Tugas Akhir </strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <form class="form-horizontal col-md-10 col-md-offset-1" method="POST" action="{{url('/user')}}">
                <fieldset>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>User Name *</h5></label>
                        <input type="text" name="username" class="form-control col-md-10" placeholder="Username">
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="bidang"><h5>Peran *</h5></label>
                        <select class="form-control" name="role">
                            <option value="1"selected>Mahasiswa</option>
                            <option value="2">Dosen</option>
                            <option value="3">Koordinator TA</option>
                        </select>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>Nama *</h5></label>
                        <input type="text" name="nama" class="form-control col-md-10" placeholder="Nama">
                    </div>
                    <br>
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <div class="form-group has-warning pull-right">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambahkan User</button>
                    </div>
                </fieldset>
            </form>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="center col-md-12 alert alert-warning" style="text-align: center;" >
                <br>
                <h4>Tambahkan User Baru Menggunakan File CSV</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#fileUploadModal"><i class="glyphicon glyphicon-file"></i> Update File</button>
            </div>
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
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/user/uploadfile')}}" style="padding: 0px 10px;">
                        <div class="form-group">
                            <label class="control-label"><h6>Select File</h6></label>
                            <input type="file" name="fileUser" class="file col-md-12" style="height: 30px;" accept=".csv">
                        </div>
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