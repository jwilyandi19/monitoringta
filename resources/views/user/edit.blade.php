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
                    <div class="form-group alert alert-dismissable alert-warning" style="margin-bottom: 0;">
                        <button type="button" class="close fade" data-dismiss="alert">&times;</button>
                        <p><strong>* harus diisi</strong></p>
                    </div>
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
                    <div class="form-group has-warning">
                        <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Tambahkan User</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                    <h4 class="modal-title" style="color: #ffffff;"> Edit Data User </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{url('/login')}}">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                                <input type="text" name="username" class="form-control" value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="nama" class="form-control" value="{{$user->nama}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Peran</label>
                            <div class="col-md-10">
                                <select class="form-control" name="role">
                                    @if($user->role == 1)
                                        <option value="1" selected>Mahasiswa</option>
                                        <option value="2">Dosen</option>
                                        <option value="3">Koordinator TA</option>
                                    @elseif($user->role == 2)
                                        <option value="1">Mahasiswa</option>
                                        <option value="2" selected>Dosen</option>
                                        <option value="3">Koordinator TA</option>
                                    @else
                                        <option value="1">Mahasiswa</option>
                                        <option value="2">Dosen</option>
                                        <option value="3" selected>Koordinator TA</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$user->id_user}}">
                        @if($user->akunDosen!=null)
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Lengkap</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{$user->akunDosen->nama_lengkap}}">
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;">Login</button>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection