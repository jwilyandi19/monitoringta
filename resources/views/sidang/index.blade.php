@extends('layout.khusus')

@section('title')
    Jadwal Sidang Tugas Akhir
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
            <h4><strong>Jadwal Sidang Tugas Akhir</strong></h4>
            <hr>
        </div>
        <div class="pencarian">
            <table id="ujian" class="table table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr class="success">
                        <th >Waktu</th>
                        <th >Bidang MK</th>
                        <th >NRP</th>
                        <th >Mahasiswa</th>
                        <th >Penguji 1</th>
                        <th >Penguji 2</th>
                        <th >Penguji 3</th>
                        <th >Penguji 4</th>
                        <th >Penguji 5</th>
                        <th style="white-space: nowrap;">Judul</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ujians as $key => $ujian)
                        <tr>
                            <td style="white-space: nowrap;">
                            @if(date('D',strtotime($ujian->jadwalUjian->tanggal)) == 'Sun')
                                {{' Minggu '}}
                            @elseif(date('D',strtotime($ujian->jadwalUjian->tanggal)) == 'Mon')
                                {{' Senin '}}
                            @elseif(date('D',strtotime($ujian->jadwalUjian->tanggal)) == 'Tue')
                                {{' Selasa '}}
                            @elseif(date('D',strtotime($ujian->jadwalUjian->tanggal)) == 'Wed')
                                {{' Rabu '}}
                            @elseif(date('D',strtotime($ujian->jadwalUjian->tanggal)) == 'Thu')
                                {{' Kamis '}}
                            @elseif(date('D',strtotime($ujian->jadwalUjian->tanggal)) == 'Fri')
                                {{' Jumat '}}
                            @elseif(date('D',strtotime($ujian->jadwalUjian->tanggal)) == 'Sat')
                                {{' Sabtu '}}
                            @endif, {{date('d/m/Y',strtotime($ujian->jadwalUjian->tanggal)).' Sesi '.$ujian->jadwalUjian->sesi}} (Ruang {{$ujian->jadwalUjian->ruang}})
                            </td>
                            <td style="white-space: nowrap;">{{$ujian->tugasAkhir->bidang->nama_bidang}}</td>
                            <td style="white-space: nowrap;">{{$ujian->tugasAkhir->user->username}}</td>
                            <td style="white-space: nowrap;">{{$ujian->tugasAkhir->user->nama}}</td>
                            <td style="white-space: nowrap;">{{$ujian->penguji1Ujian->nama_lengkap}}</td>
                            <td style="white-space: nowrap;">{{$ujian->penguji2Ujian->nama_lengkap}}</td>
                            
                            @if($ujian->penguji3Ujian)
                                <td style="white-space: nowrap;">{{$ujian->penguji3Ujian->nama_lengkap}}</td>
                            @else
                                <td style="white-space: nowrap;">-</td>
                            @endif

                            @if($ujian->penguji4Ujian)
                                <td style="white-space: nowrap;">{{$ujian->penguji4Ujian->nama_lengkap}}</td>
                            @else
                                <td style="white-space: nowrap;">-</td>
                            @endif

                            @if($ujian->penguji5Ujian)
                                <td style="white-space: nowrap;">{{$ujian->penguji5Ujian->nama_lengkap}}</td>
                            @else
                                <td >-</td>
                            @endif
                            <td style="white-space: nowrap;">{{$ujian->tugasAkhir->judul}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
    
@endsection

@section('moreScript')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#ujian').DataTable({
            "scrollX" : true,
            "autoWidth" : false,
            "scrollCollapse" : true,
        });
    });
</script>
@endsection

