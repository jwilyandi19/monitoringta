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
                        <th class="">ID Proposal</th>
                        <th class="col-md-1">Tanggal Pengajuan</th>
                        <th class="col-md-8">Judul Tugas Akhir</th>
                        <th class="col-md-1 text-center">Pembimbing 1</th>
                        <th class="col-md-1 text-center">Pembimbing 2</th>
                        <th class="col-md-1 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tugasAkhirs as $keys => $tugasAkhir)
                        <tr>
                            <td class="text-center">{{$tugasAkhir->id_ta}}</td>
                            <td>{{date('Y-m-d',strtotime($tugasAkhir->created_at))}}</td>
                            <td>{{$tugasAkhir->judul}}</td>
                            @if($tugasAkhir->dosbing1)
                                <td>{{$tugasAkhir->dosbing1->nama_lengkap}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif

                            @if($tugasAkhir->dosbing2)
                                <td>{{$tugasAkhir->dosbing2->nama_lengkap}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif
                            
                            <td>{{$tugasAkhir->status->keterangan}}</td>
                            
                             
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

