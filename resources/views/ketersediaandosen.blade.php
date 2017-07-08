@extends('layout.main')

@section('title')
Ketersediaan Dosen
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
            <h4><strong>Ketersediaan Jadwal Seminar</strong></h4>
            <hr>
        </div>
        <div class="alert alert-warning">
            <h4>Perhatian</h4>
            <p>Berikut merupakan form ketersediaan jadwal seminar dosen, dengan menekan tombol sesi anda dinyatakan bersedia untuk mengikuti seminar pada sesi dan tanggal yang terpilih </p>
        </div>
        <div class="">
            <div class="" style="height: 510px; width: 100%;">
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Senin, 3 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Selasa, 4 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Rabu, 5 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Kamis, 6 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Jumat, 7 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Senin, 10 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Selasa, 11 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Rabu, 12 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Kamis, 13 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Jumat, 14 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi sesi-success" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
                <div class="kotak-tanggal">
                    <div class="panel tanggal">
                        <p><strong>Senin, 17 Juli 2017</strong></p>
                    </div>
                    <div class="panel sesi-tanggal">
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 1</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 2</p></button>
                        <button class="btn btn-default btn-xs btn-block sesi" ><p>sesi 3</p></button>
                    </div>   
                </div>
            </div>
            
        </div>
        
	</div>	
@endsection

@section('moreScript')

@endsection

