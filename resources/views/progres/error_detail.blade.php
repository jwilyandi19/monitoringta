@extends('layout.main')

@section('title')
    Pengajuan TA
@endsection

@section('moreStyle')

@endsection

@section('content')
    <div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
        <div class="judul-halaman">
            <h4><strong>Detail Progres Tugas Akhir </strong></h4>
            <hr>
        </div>
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
        <div class="alert alert-warning">
            <h4><i class="glyphicon glyphicon-exclamation-sign"></i> Anda Tidak Memiliki Tugas Akhir</h4>
            <p>Belum mengajukan Tugas Akhir, atau Tugas Akhir sudah di tolak</p>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection

