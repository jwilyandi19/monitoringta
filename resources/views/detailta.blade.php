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
            <div class="alert alert-warning">
                <h4>Perhatian</h4>
                <p><strong>Anda belum pernah mengupload file proposal</strong></p>
                <p><strong>Anda belum pernah melakukan bimbingan</strong></p>
            </div>
            <form class="form-horizontal col-md-12" method="POST" action="{{url('/penagjuanta')}}">
                <fieldset>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">NRP</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: 5114100110</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">Nama</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: Rafiar Rahmansyah</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">Judul Tugas Akhir</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: Implementasi Aplikasi Manajemen API Berbasis Protokol REST Menggunakan Platform WSO2</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">Pembimbing 1</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: RIZKY JANUAR AKBAR, S.Kom., M.Eng.</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">Pembimbing 2</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: WIJAYANTI NURUL K.,S.Kom., M.Sc.</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">RMK</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: RPL</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">Status</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: Tunggu Seminar</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">Keterangan Revisi</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: -</h6> 
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="control-label col-md-2" for="judulta"><h6 class="pull-left">File Proposal</h6></label>
                        <div class="col-md-10" style="padding-top: 7px;">
                            <h6>: -</h6> 
                        </div>
                    </div>
                    <div class="form-group" >
                        
                    </div>
                    <hr>
                    <div class="judul-halaman">
                        <h4><strong>Progres Bimbingan</strong></h4>
                    </div>
                </fieldset>                
            </form>
        </div>
    </div>  
@endsection

@section('moreScript')

@endsection

