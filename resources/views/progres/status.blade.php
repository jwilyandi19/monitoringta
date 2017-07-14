@extends('layout.main')

@section('title')
Status TA
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
            <h4><strong>Status Tugas Akhir</strong></h4>
            <hr>
        </div>
        <div class="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Proposal</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Judul Tugas Akhir</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                        <th>Status</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($taMahasiswas as $taMahasiswa)
                        <tr>
                            <td>{{$taMahasiswa->id_ta}}</td>
                            <td>{{$taMahasiswa->tanggal}}</td>
                            <td>{{$taMahasiswa->judul}}</td>
                            <td>Dr.Eng. CHASTINE FATICHAH, S.Kom., M.Kom.</td>
                            <td>BILQIS AMALIAH, S.Kom., M.Kom.</td>
                            <td>Menuju Seminar</td>
                            <td><a href="#" class="btn btn-sm btn-info">Ubah</a></td> 
                        </tr>
                    @endforeach
                    <tr>
                        <td>3158</td>
                        <td>29/06/2016</td>
                        <td>Rancang Bangun Aplikasi MusicMoo menggunakan Metode MIR (music Information Retrieval) pada Modul Transcription, Symbolic Melodic Similarity, Source Separation, dan Score Alignment</td>
                        <td>Prof. Drs.Ec. Ir. RIYANARTO SARNO, M.Sc., Ph.D.</td>
                        <td>DWI SUNARYONO, S.Kom., M.Kom.</td>
                        <td>Ditolak</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

