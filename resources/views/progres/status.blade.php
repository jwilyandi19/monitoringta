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
                        <th class="text-center">ID Proposal</th>
                        <th class="col-md-2">Tanggal Pengajuan</th>
                        <th class="col-md-8">Judul Tugas Akhir</th>
                        <th class="col-md-1 text-center">Pembimbing 1</th>
                        <th class="col-md-1 text-center">Pembimbing 2</th>
                        <th class="col-md-1 text-center">Status</th>
                        <th class="col-md-1 text-center">Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($tugasAkhirs as $keys => $tugasAkhir)
                        <tr>
                            <td class="text-center">{{$tugasAkhir->id_ta}}</td>
                            <td>{{$tugasAkhir->tanggalBuat}}</td>
                            <td>{{$tugasAkhir->judul}}</td>
                            @if($tugasAkhir->dosbing1)
                                <td>{{$tugasAkhir->dosbing->nama_lengkap}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif

                            @if($tugasAkhir->dosbing2)
                                <td>{{$tugasAkhir->dosbing2->nama_lengkap}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif
                            
                            <td>{{$tugasAkhir->status->keterangan}}</td>
                            
                            @if($tugasAkhir->id_status >= 0)
                                <td class="text-center"><a href="#" class="btn btn-sm btn-info">Ubah</a></td>
                            @else
                                <td class="text-center">-</td>
                            @endif
                             
                        </tr>    
                    @endforeach
                    <!-- <tr>
                        <td>3282</td>
                        <td>22/11/2016</td>
                        <td>Studi Kinerja Metode Ekstraksi Fitur Local Line Binary Pattern dan Scale Invariant Feature Transform pada Aplikasi Palm dan Finger Vein Recognition</td>
                        <td>Dr.Eng. CHASTINE FATICHAH, S.Kom., M.Kom.</td>
                        <td>BILQIS AMALIAH, S.Kom., M.Kom.</td>
                        <td>Menuju Seminar</td>
                        <td><a href="#" class="btn btn-sm btn-info">Ubah</a></td> 
                    </tr>
                    <tr>
                        <td>3158</td>
                        <td>29/06/2016</td>
                        <td>Rancang Bangun Aplikasi MusicMoo menggunakan Metode MIR (music Information Retrieval) pada Modul Transcription, Symbolic Melodic Similarity, Source Separation, dan Score Alignment</td>
                        <td>Prof. Drs.Ec. Ir. RIYANARTO SARNO, M.Sc., Ph.D.</td>
                        <td>DWI SUNARYONO, S.Kom., M.Kom.</td>
                        <td>Ditolak</td>
                        <td>-</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

