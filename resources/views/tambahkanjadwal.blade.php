@extends('layout.main')

@section('title')
Manajemen Jadwal
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
            <h4><strong>Manajemen Jadwal</strong></h4>
            <hr>
        </div>
        <div class="" style="background-color: #f4f4f4; padding: 10px;">
            <h5><strong>Tambahkan Jadwal Seminar</strong></h5>
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="tanggalSeminar">Tanggal Seminar</label>
                        <div class="col-md-10">
                            <input type="date" name="tanggalSeminar" id="tanggalSeminar">
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-primary pull-right" style="margin-right: 50px;">Tambahkan Jadwal</a>
                        <!-- <button type="submit" class="btn btn-primary">Tambahkan Jadwal</button> -->
                    </div>
                </fieldset>
            </form>
        </div>
        <br>
        <div class="">
            <h5><strong>Jadwal Seminar Saat Ini</strong></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: center;">03/06/2017</td>
                        <td>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </td> 
                    </tr>
                    <tr>
                        <td style="text-align: center;">2</td>
                        <td style="text-align: center;">04/06/2017</td>
                        <td>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </td> 
                    </tr>
                    <tr>
                        <td style="text-align: center;">3</td>
                        <td style="text-align: center;">05/06/2017</td>
                        <td>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </td> 
                    </tr>
                    <tr>
                        <td style="text-align: center;">4</td>
                        <td style="text-align: center;">06/06/2017</td>
                        <td>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <hr style="border-top: 1px solid #24292e;">
        <div class="" style="background-color: #f4f4f4; padding: 10px;">
            <h5><strong>Tambahkan Jadwal Sidang</strong></h5>
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="tanggalSeminar">Tanggal Sidang</label>
                        <div class="col-md-10">
                            <input type="date" name="tanggalSeminar" id="tanggalSeminar">
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-primary pull-right" style="margin-right: 50px;">Tambahkan Jadwal</a>
                        <!-- <button type="submit" class="btn btn-primary">Tambahkan Jadwal</button> -->
                    </div>
                </fieldset>
            </form>
        </div>
        <br>
        <div class="">
            <h5><strong>Jadwal Sidang Saat Ini</strong></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: center;">03/06/2017</td>
                        <td>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

