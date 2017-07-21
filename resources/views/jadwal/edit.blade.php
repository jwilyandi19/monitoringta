@extends('layout.main')

@section('title')
    Detail Jadwal
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
            <h4><strong>Edit Data Jadwal</strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <form class="form-horizontal" method="POST" action="{{str_replace('/edit','',Request::url())}}">
                <div class="row form-group">
                    <label class="col-md-2 col-md-offset-1"><h6 class="pull-left">Nama Jadwal</h6></label>
                    <div class="col-md-9">
                        <h6>{{$jadwal->nama}}</h6>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 col-md-offset-1"><h6 class="pull-left">Tanggal</h6></label>
                    <div class="col-md-9">
                        <input type="date" name="tanggal">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="pull-right">
                        <a class="btn btn-default" href="{{url('/jadwal/'.$jadwal->id_jadwal)}}" style="margin-right: 20px;"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali </a>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ubah</button>
                    </div>
                </div>
            </form>
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

