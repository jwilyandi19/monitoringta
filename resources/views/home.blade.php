@extends('layout.main')

@section('title')
Home
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
            <h4><strong>Berita</strong></h4>
            <hr>
        </div>
        <div class="berita">
            <h5>Kelengkapan yang WAJIB dipenuhi setelah sidang Tugas Akhir</h5>
            <p class="text-warning">Admin, Kamis 7 Juli 2017 pukul 08:42:55 WIB</p>
            <div class="berita-singkat">
                <p>Berikut beberapa kelengkapan yang wajib ...</p> 
            </div>
            <a href="#" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-eye-open"></i> Lihat Selengkapnya</a>
            <br>
            <br>
            <hr class="berita">
        </div>
        <div class="berita">
            <h5>Pembagian RMK Beserta Anggotanya</h5>
            <p class="text-warning">Admin, Selasa 4 Juli 2017 pukul 16:42:55 WIB</p>
            <div class="berita-singkat">
                <p>Berikut beberapa RMK yang ada ...</p> 
            </div>
            <a href="#" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-eye-open"></i> Lihat Selengkapnya</a>
            <br>
            <br>
            <hr class="berita">
        </div>
        <div class="berita">
            <h5>Panduan dan Prosedur Tugas Akhir</h5>
            <p class="text-warning">Admin, Senin 3 Juli 2017 pukul 12:42:55 WIB</p>
            <div class="berita-singkat">
                <p>Terlampir Beberapa File Pendukung Tugas Akhir:<br />
                    1. Panduan Penggunaan sistem Monitoring Tugas Akhir (MONTA) dengan user role Mahasiswa.<br />
                    2. Template proposal TA<br />
                    3. Pedoman tata tulis TA<br />
                    4. Prosedur dan aturan TA</p>
                <p>Terima kasih</p>...
            </div>
            <a href="#" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-eye-open"></i> Lihat Selengkapnya</a>
            <br>
            <br>
            <hr class="berita">
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

