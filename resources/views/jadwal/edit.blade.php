@extends('layout.main')

@section('title')
    Detail Jadwal
@endsection

@section('moreStyle')
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-material-datetimepicker.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                    <div class="col-md-1 pull-right">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-8">
                        <h6>{{$jadwal->nama}}</h6>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 col-md-offset-1"><h6 class="pull-left">Tanggal & Waktu</h6></label>
                    <div class="col-md-1 pull-right">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-8">
                        <input id="inp-tanggal" type="text" name="tanggal">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="pull-right">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <a class="btn btn-default" href="{{url('/jadwal/'.$jadwal->id_jadwal)}}" style="margin-right: 20px;"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali </a>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('moreScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
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
        $(document).ready(function(){
            $('#inp-tanggal').bootstrapMaterialDatePicker
            ({
                format: 'YYYY-MM-DD HH:mm:00'
            });
        });
    </script>

@endsection

