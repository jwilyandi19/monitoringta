@extends('layout.khusus')

@section('title')
Pencarian Tugas Akhir
@endsection

@section('moreStyle')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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
            <h4><strong>Pencarian Tugas Akhir</strong></h4>
            <hr>
        </div>
        <div class="pencarian">
            <table id="tugasAkhir" class="table table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr class="">
                        <th class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Bidang MK</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">NRP</th>
                        <th class="text-center">Nama</th>
                        <th>Judul</th>
                        <th>Pembimbing1</th>
                        <th>Pembimbing2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tugasAkhirs as $key => $tugasAkhir)
                        @if($key%2 == 0)
                            <tr class="btn-link warning" data-toggle="modal" data-target="#modalDataTA">
                        @else
                            <tr class="btn-link" data-toggle="modal" data-target="#modalDataTA">
                        @endif
                            <td>{{$key+1}}</td>
                            <td>{{$tugasAkhir->id_ta}}</td>
                            <td id="row-rumpun" style="white-space: nowrap;">{{$tugasAkhir->bidang->nama_bidang}}</td>
                            <td id="row-status" style="white-space: nowrap;">{{$tugasAkhir->status->keterangan}}</td>
                            <td id="row-nrp" style="white-space: nowrap;">{{$tugasAkhir->user->username}}</td>
                            <td id="row-nama" style="white-space: nowrap;">{{$tugasAkhir->user->nama}}</td>
                            <td id="row-judul" style="white-space: nowrap;">{{$tugasAkhir->judul}}</td>

                            
                            @if($tugasAkhir->dosbing1)
                                <td id="row-pembimbing1" style="white-space: nowrap;">{{$tugasAkhir->dosbing1->nama_lengkap}}</td>
                            @elseif($pembimbing1temps[$key])
                                <td id="row-pembimbing1" style="white-space: nowrap;">{{$pembimbing1temps[$key]->nama_lengkap}} (Mengajukan)</td>
                            @else
                                <td id="row-pembimbing1" style="white-space: nowrap;">-</td>
                            @endif
                            
                            @if($tugasAkhir->dosbing2)
                                <td id="row-pembimbing2" style="white-space: nowrap;">{{$tugasAkhir->dosbing2->nama_lengkap}}</td>
                            @elseif($pembimbing2temps[$key])
                                <td id="row-pembimbing2" style="white-space: nowrap;">{{$pembimbing2temps[$key]->nama_lengkap}} (Mengajukan)</td>
                            @else
                                <td id="row-pembimbing2" style="white-space: nowrap;">-</td>
                            @endif
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
    <div class="modal modal-md fade" id="modalDataTA">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ffffff;">&times;</button>
                    <h4 class="modal-title" style="color: #ffffff;"> Detail Tugas Akhir Mahasiswa</h4>
                </div>
                <div class="modal-body panel panel-body" style="margin-bottom: 0px; padding: 20px;">
                    
                    <div class="row">
                        <h6 class="col-md-3">NRP</h6>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>: </h6>
                        </div>
                        <div class="col-md-8">
                            <h6 id="modal-nrp"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="col-md-3">Nama</h6>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>: </h6>
                        </div>
                        <div class="col-md-8">
                            <h6 id="modal-nama"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="col-md-3">Judul</h6>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>: </h6>
                        </div>
                        <div class="col-md-8">
                            <h6 id="modal-judul"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="col-md-3">Pembimbing 1</h6>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>: </h6>
                        </div>
                        <div class="col-md-8">
                            <h6 id="modal-pembimbing1"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="col-md-3">Pembimbing 2</h6>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>: </h6>
                        </div>
                        <div class="col-md-8">
                            <h6 id="modal-pembimbing2"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="col-md-3">Bidang</h6>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>: </h6>
                        </div>
                        <div class="col-md-8">
                            <h6 id="modal-rumpun"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="col-md-3">Status</h6>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>: </h6>
                        </div>
                        <div class="col-md-8">
                            <h6 id="modal-status"></h6>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #24292e;">
                    <div class="row">
                        <button id="close" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 10px;">close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('moreScript')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#tugasAkhir').DataTable({
            "scrollX" : true,
            "autoWidth" : true,
            "scrollCollapse" : true,
        });
    });
    $('.btn-link').click(function(){
        var nrp = $(this).find('#row-nrp').text();
        var nama = $(this).find('#row-nama').text();
        var judul = $(this).find('#row-judul').text();
        var pembimbing1 = $(this).find('#row-pembimbing1').text();
        var pembimbing2 = $(this).find('#row-pembimbing2').text();
        var rumpun = $(this).find('#row-rumpun').text();
        var status = $(this).find('#row-status').text();
        console.log(pembimbing1);
        $('#modal-nrp').text(nrp);
        $('#modal-nama').text(nama);
        $('#modal-judul').text(judul);
        $('#modal-pembimbing1').text(pembimbing1);
        $('#modal-pembimbing2').text(pembimbing2);
        $('#modal-rumpun').text(rumpun);
        $('#modal-status').text(status);
    });
    $('close').click(function(){

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        
    });
</script>
@endsection

