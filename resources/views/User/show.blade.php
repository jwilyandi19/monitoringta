@extends('layout.main')

@section('title')
    Detail Tugas Akhir
@endsection

@section('moreStyle')
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
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
            <h4><strong>Detail Data User</strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <div >
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">Username</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->username}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->nama}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Peran</h6></label>
                    <div class="col-md-10">
                        @if($user->role == 1)
                            <h6>: Mahaiswa</h6>
                        @elseif($user->role == 2)
                            <h6>: Dosen</h6>
                        @else
                            <h6>: Koordinator Tugas Akhir</h6>
                        @endif
                    </div>
                </div>
                <br>
            </div>
            @if($user->akunDosen!=null)
                <br>
                <hr>
                <div>
                    <h4>Data Dosen</h4>
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">NIP</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->akunDosen->nip}}</h6>
                    </div>
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->akunDosen->nama}}</h6>
                    </div>
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">Nama Lengkap</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->akunDosen->nama_lengkap}}</h6>
                    </div>
                </div>
            @endif
            <div class="form-group">
                <div class="pull-right">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali </button>
                    <button class="btn btn-info" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit User</button>
                    <button class="btn btn-danger" id="hapus"><i class="glyphicon glyphicon-trash"></i> Hapus User</button>

                </div>
            </div>
            <form id="hapus-user" action="{{url('/user/'.$user->id_user)}}" method="POST" >
                {{csrf_field()}}
                {{method_field('DELETE')}}
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
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).on('click', '#hapus', function(){
            var idUserHapus = $(this).attr('value');
            console.log(idUserHapus);
            swal({
                    title: "Perhatian",
                    text: "Apakah anda yakin ingin Menghapus User ini ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal"
                },
                function(){
                    $('#inp-userHapus').val(idUserHapus);
                    $('#hapus-user').submit();
                });
        });
    </script>

@endsection

