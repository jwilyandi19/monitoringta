@extends('layout.main')

@section('title')
Mahasiswa Bimbingan
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
            <h4><strong>Mahasiswa Bimbingan</strong></h4>
            <hr>
        </div>
        <div class="konfirmasi">
            <h5><strong>Konfirmasi Mahasiswa Bimbingan</strong></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Judul TA</th>
                        <th>Sebagai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 0;?>
                    @if($konfirmasis)
                        @foreach($konfirmasis as $key => $konfirmasi)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$konfirmasi->tugasAkhir->user->username}}</td>
                                <td>{{$konfirmasi->tugasAkhir->user->nama}}</td>
                                <td>{{$konfirmasi->tugasAkhir->judul}}</td>
                                <td>Pembimbing {{$konfirmasi->peran}}</th>
                                <td>
                                    <div style="text-align: center;">
                                        <a href="#" class="btn btn-danger btn-sm">Tolak</a>
                                        <a href="#" class="btn btn-success btn-sm">Terima</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <!-- <tr>
                        <td>1</td>
                        <td>5113100001</td>
                        <td>Muhammad Adnan Yusuf</td>
                        <td>Clustering dan Merging bisnis proses model berdasarkan Graph Database</td>
                        <td>Pembimbing 1</th>
                        <td>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-danger btn-sm">Tolak</a>
                                <a href="#" class="btn btn-success btn-sm">Terima</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>5113100147</td>
                        <td>Lusiana Nurul Aini</td>
                        <td>Studi Kinerja Metode Ekstraksi Fitur Local Line Binary Pattern dan Scale Invariant Feature Transform pada Aplikasi Palm dan Finger Vein Recognition</td>
                        <td>Pembimbing 2</th>
                        <td>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-danger btn-sm">Tolak</a>
                                <a href="#" class="btn btn-success btn-sm">Terima</a>
                            </div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <br>
        <hr style="border-top : 1px solid #24292e;">
        <div class="mahasiswa-bimbingan">
            <h5><strong>List Mahasiswa Bimbingan</strong></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Judul TA</th>
                        <th>Sebagai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($bimbingans)
                        @foreach($bimbingans as $key => $bimbingan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bimbingan->user->username}}</td>
                                <td>{{$bimbingan->user->nama}}</td>
                                <td>{{$bimbingan->judul}}</td>
                                @if($)
                                @else
                                @endif
                                <td>Pembimbing 1</th>
                                <td><a href="detailta2" class="btn btn-info btn-sm">Detail TA</a></td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td>1</td>
                        <td>5114100046</td>
                        <td>Raras Anggita</td>
                        <td>Implementasi Aplikasi Manajemen API Berbasis Protokol REST Menggunakan Platform WSO2</td>
                        <td>Pembimbing 1</th>
                        <td><a href="detailta2" class="btn btn-info btn-sm">Detail TA</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>5113100147</td>
                        <td>Lusiana Nurul Aini</td>
                        <td>Studi Kinerja Metode Ekstraksi Fitur Local Line Binary Pattern dan Scale Invariant Feature Transform pada Aplikasi Palm dan Finger Vein Recognition</td>
                        <td>Pembimbing 2</th>
                        <td><a href="detailta2" class="btn btn-info btn-sm">Detail TA</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

