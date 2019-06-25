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
                        <h6>: Mahasiswa</h6>
                    @elseif($user->role == 2)
                        <h6>: Dosen</h6>
                    @else
                        <h6>: Koordinator Tugas Akhir</h6>
                    @endif
                </div>
            </div>
            <br>
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
                    <button class="btn btn-default" id="kembali" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali </button>
                    <button class="btn btn-info" id="edit" data-toggle="modal" data-target="#editModal" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-edit"></i> Edit User</button>
                    <button class="btn btn-danger" id="hapus" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-trash"></i> Hapus User</button>
                </div>
            </div>
            <form id="kembali-user" action="{{url('/user')}}" method="GET" >
                {{csrf_field()}}
            </form>
            <form id="edit-user" action="{{url('/user/'.$user->id_user.'/edit')}}" method="GET" >
                {{csrf_field()}}
            </form>
            <form id="hapus-user" action="{{url('/user/'.$user->id_user)}}" method="POST" >
                {{csrf_field()}}
                {{method_field('DELETE')}}
            </form>
        </div>
    </div>

@endsection

@section('moreScript')
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).on('click', '#edit', function(){
            $('#edit-user').submit();
        });
        $(document).on('click', '#kembali', function(){
            $('#kembali-user').submit();
        });
        $(document).on('click', '#hapus', function(){
            console.log("MASUK");
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

