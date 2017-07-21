@extends('layout.main')

@section('title')
Pengajuan TA
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
            <form class="form-horizontal col-md-10 col-md-offset-1" method="POST" action="{{str_replace('/create','',Request::url())}}">
                <fieldset>
                    <div class="form-group alert alert-dismissable alert-warning" style="margin-bottom: 0;">
                        <button type="button" class="close fade" data-dismiss="alert">&times;</button>
                        <p><strong>* harus diisi</strong></p>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>Judul Tugas Akhir *</h5></label>
                        <textarea type="text" name="judulTA" class="form-control col-md-10" placeholder="Judul Tugas Akhir"></textarea>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="bidang"><h5>Bidang Matakuliah *</h5></label>
                        <select class="form-control" name="bidangMk">
                            <option value="" selected >Bidang Matakuliah</option>
                            @foreach($bidang_mks as $key => $bidang_mk)
                                <option value="{{$bidang_mk->id_bidang_mk}}">{{$bidang_mk->nama_bidang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="pembimbing1"><h5>Dosen Pembiming 1 *</h5></label>
                        <select class="form-control" name="pembimbing1">
                            <option value="" selected >Pilih Dosen Pembimbing 1</option>
                            @foreach($pembimbing1s as $key => $pembimbing1)
                                <option value="{{$pembimbing1->id_dosen}}">{{$pembimbing1->nama}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="pembimbing2"><h5>Dosen Pembiming 2</h5></label>
                        <select class="form-control" name="pembimbing2">
                            <option value="" selected >Pilih Dosen Pembimbing 2</option>
                            @foreach($pembimbing2s as $key => $pembimbing2)
                                <option value="{{$pembimbing2->id_dosen}}">{{$pembimbing2->nama}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <br>
                    {{csrf_field()}}
                    {{method_field('POST')}}                
                    <div class="form-group has-warning">
                        <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Ajukan Judul</button>                        
                    </div>
                </fieldset>
            </form>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

