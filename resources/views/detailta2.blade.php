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
            <div >
                <div class="alert alert-warning">
                    <h4>Perhatian</h4>
                    <p><strong>Anda belum pernah mengupload file proposal</strong></p>
                    <p><strong>Anda belum pernah melakukan bimbingan</strong></p>
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">NRP</h6></label>
                    <div class="col-md-10">
                        <h6>: 5114100110</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-10">
                        <h6>: Rafiar Rahmansyah</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Judul Tugas Akhir</h6></label>
                    <div class="col-md-10">
                        <h6>: Implementasi Aplikasi Manajemen API Berbasis Protokol REST Menggunakan Platform WSO2</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 1</h6></label>
                    <div class="col-md-10">
                        <h6>: RIZKY JANUAR AKBAR, S.Kom., M.Eng.</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 2</h6></label>
                    <div class="col-md-10">
                        <h6>: WIJAYANTI NURUL K.,S.Kom., M.Sc.</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">RMK</h6></label>
                    <div class="col-md-10">
                        <h6>: RPL</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Status</h6></label>
                    <div class="col-md-10">
                        <h6>: Tunggu Seminar</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">File Proposal</h6></label>
                    <div class="col-md-10">
                        <h6>: -</h6> 
                    </div>
                </div>
                <button class="btn btn-primary pull-right">Tambahkan File</button>
                <br>    
            </div>
            <br>
            <hr>
            <div>
                <h4>Progres bimbingan</h4>
                <div class="">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Bimbingan</th>
                                <th>Tanggal</th>
                                <th>Materi Bimbingan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>
            <div>
                <h4>Seminar Tugas Akhir</h4>
            </div>
            <div class="row">
                <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <br>
            <hr>
            <div>
                <h4>Sidang Tugas Akhir</h4>
            </div>
            <div class="row">
                <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <br>

        </div>
    </div>  
@endsection

@section('moreScript')

@endsection

