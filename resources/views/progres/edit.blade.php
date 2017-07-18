@extends('layout.main')

@section('title')
Ubah Detail Tugas Akhir
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
            <h4><strong>Pengajuan Judul Tugas Akhir </strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <form class="form-horizontal col-md-10 col-md-offset-1" method="POST" action="{{str_replace('/edit','',Request::url())}}">
                <fieldset>
                    <div class="form-group alert alert-dismissable alert-warning" style="margin-bottom: 0;">
                        <button type="button" class="close fade" data-dismiss="alert">&times;</button>
                        <h4>Perhatian</h4>
                        <p><strong>Dengan melakukan perubahan anda dinyatakan sadar betul akan perubahan yang anda lakukan pada tugas akhir anda dan sudah menghubungi dosen pembimbing anda</strong></p>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>Judul Tugas Akhir</h5></label>
                        <textarea type="text" name="judulTA" class="form-control col-md-10">{{$tugasAkhir->judul}}</textarea>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="bidang"><h5>Bidang Matakuliah</h5></label>
                        <select class="form-control" name="bidangMk">
                            @foreach($bidang_mks as $bidang_mk)
                                @if($bidang_mk->id_bidang_mk == $tugasAkhir->id_bidang_mk)
                                    <option value="{{$bidang_mk->id_bidang_mk}}" selected>{{$bidang_mk->nama_bidang}}</option>
                                @else
                                    <option value="{{$bidang_mk->id_bidang_mk}}">{{$bidang_mk->nama_bidang}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="pembimbing1"><h5>Dosen Pembiming 1</h5></label>
                        <select class="form-control" name="pembimbing1">
                            @if(!$tugasAkhir->id_dosbing1)
                                <option value="" selected >Pilih Dosen Pembimbing 1</option>
                            @endif
                            @foreach($dosens as $dosen)
                                @if($tugasAkhir->id_dosbing1 && $dosen->id_dosen == $tugasAkhir->id_dosbing1)
                                    <option value="{{$dosen->id_dosen}}" selected>{{$dosen->nama}}</option>
                                @else
                                    <option value="{{$dosen->id_dosen}}">{{$dosen->nama}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="pembimbing2"><h5>Dosen Pembiming 2</h5></label>
                        <select class="form-control" name="pembimbing2">
                            @if(!$tugasAkhir->id_dosbing2)
                                <option value="" selected >Pilih Dosen Pembimbing 2</option>
                            @endif
                            @foreach($dosens as $dosen)
                                @if($tugasAkhir->id_dosbing2 && $dosen->id_dosen == $tugasAkhir->id_dosbing2)
                                    <option value="{{$dosen->id_dosen}}" selected>{{$dosen->nama}}</option>
                                @else
                                    <option value="{{$dosen->id_dosen}}">{{$dosen->nama}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <br>
                    {{csrf_field()}}
                    {{method_field('PUT')}}                
                    <div class="form-group has-warning">
                        <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Ubah Detail TA</button>
                        <a href="{{url('/progres')}}" class="btn btn-default pull-right" style="margin-right: 10px;">Kembali</a>
                    </div>
                </fieldset>
            </form>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

