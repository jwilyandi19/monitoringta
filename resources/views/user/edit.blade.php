@extends('layout.main')

@section('title')

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
            <form class="form-horizontal col-md-10 col-md-offset-1" method="POST" action="{{url('/user/'.$user->id_user)}}">
                <fieldset>
                    <div class="form-group alert alert-dismissable alert-warning" style="margin-bottom: 0;">
                        <button type="button" class="close fade" data-dismiss="alert">&times;</button>
                        <p><strong>* harus diisi</strong></p>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>User Name *</h5></label>
                        <input type="text" name="username" class="form-control col-md-10" value="{{$user->username}}">
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>Nama *</h5></label>
                        <input type="text" name="nama" class="form-control col-md-10" value="{{$user->nama}}">
                    </div>
                    <div id="nama-lengkap" class="form-group has-warning" style="display: none;">
                        <label class="control-label" for="judulta"><h5>Nama Lengkap *</h5></label>
                        @if($user->akunDosen!=null)
                            <input type="text" name="nama_lengkap" class="form-control col-md-10" value="{{$user->akunDosen->nama_lengkap}}">
                        @else
                            <input type="text" name="nama_lengkap" class="form-control col-md-10" placeholder="Nama Lengkap..">
                        @endif
                    </div>
                    <br>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group ">
                        <div class="pull-right">
                            <button id="kembali" class="btn btn-default" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>
                            <button id="edit" class="btn btn-primary" style="margin-left: 10px;margin-right: 10px;"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@section('moreScript')
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        function hideFunction() {
            console.log("MASUK")
            var x = document.getElementById("peran").value
            console.log(x)
            if(x==2) {
                console.log("Dosen")
                $("#nama-lengkap").show()
            }
            else {
                console.log("dll")
                $("#nama-lengkap").hide()
            }
        }
        $(document).on('click', '#kembali', function(){
            $('#kembali-user').submit();
        });
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