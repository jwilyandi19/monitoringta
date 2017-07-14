@extends('layout.main')

@section('title')
Ganti Password
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
            <h4><strong>Ganti Password</strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <form class="form-horizontal col-md-10 col-md-offset-1" method="POST" action="/gantipassword">
                <fieldset>
                    <div class="form-group has-warning">
                        <label class="control-label col-md-3" for="judulta" style="text-align: left"><h5>Password Lama</h5></label>
                        <div class="col-md-9">
                            <input type="password" name="passwordLama" class="form-control" placeholder="Password lama">
                        </div>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label col-md-3" for="judulta" style="text-align: left"><h5>Password Baru</h5></label>
                        <div class="col-md-9">
                            <input type="password" name="passwordBaru" class="form-control" placeholder="Password lama">
                        </div>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label col-md-3" for="judulta" style="text-align: left"><h5>Konfirmasi Password</h5></label>
                        <div class="col-md-9">
                            <input type="password" name="konfirmasiPassword" class="form-control" placeholder="Password lama">
                        </div>
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

