@extends('layout.khusus')

@section('title')
Ketersediaan Sidang Dosen
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
            <h4><strong>Ketersediaan Sidang Dosen</strong></h4>
            <hr>
        </div>
        <div class="pencarian">
            <table id="ketersediaansidang" class="table table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr class="success">
                        <th style="vertical-align: middle; white-space: nowrap;" rowspan="3">No</th>
                        <th style="vertical-align: middle; white-space: nowrap;" rowspan="3">Dosen Penguji</th>
                        <th style="text-align: center; white-space: nowrap;" colspan="{{count($jadwals)}}">Hari dan Sesi</th>
                    </tr>
                    <tr class="success">
                        @foreach($jadwals as $key => $jadwal)
                            @if($key%3==0)
                                <th style="white-space: nowrap;" colspan="3">
                                    @if(date('D',strtotime($jadwal->tanggal)) == 'Sun')
                                        {{' Minggu '}}
                                    @elseif(date('D',strtotime($jadwal->tanggal)) == 'Mon')
                                        {{' Senin '}}
                                    @elseif(date('D',strtotime($jadwal->tanggal)) == 'Tue')
                                        {{' Selasa '}}
                                    @elseif(date('D',strtotime($jadwal->tanggal)) == 'Wed')
                                        {{' Rabu '}}
                                    @elseif(date('D',strtotime($jadwal->tanggal)) == 'Thu')
                                        {{' Kamis '}}
                                    @elseif(date('D',strtotime($jadwal->tanggal)) == 'Fri')
                                        {{' Jumat '}}
                                    @elseif(date('D',strtotime($jadwal->tanggal)) == 'Sat')
                                        {{' Sabtu '}}

                                    @endif, {{date('d/m/Y',strtotime($jadwal->tanggal))}} (Ruang {{$jadwal->ruang}})
                                </th>
                            @endif
                        @endforeach
                    </tr>
                    <tr class="success">
                        @foreach($jadwals as $key => $jadwal)
                            <th style="white-space: nowrap;">
                                @if($jadwal->sesi == '1')
                                    {{'Sesi 1'}}
                                @elseif($jadwal->sesi == '2')
                                    {{'Sesi 2'}}
                                @elseif($jadwal->sesi == '3')
                                    {{'Sesi 3'}}
                                @endif
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosens as $key => $dosen)
                    <tr>
                        <td style="white-space: nowrap;">{{$key+1}}</td>
                        <td style="white-space: nowrap;">{{$dosen->nama_lengkap}}</td>
                        @foreach($jadwals as $jadwal)
                            @if($ketersediaanDosen[$dosen->id_dosen][$jadwal->id_ju])
                                <td style="white-space: nowrap;"><i class="glyphicon glyphicon-ok"></i></td>
                            @else
                                <td style="white-space: nowrap;"></td>
                            @endif
                        @endforeach
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
        $('#ketersediaansidang').DataTable({
            "scrollX" : true,
            "autoWidth" : true,
            "scrollCollapse" : true,
        });
    });
</script>
@endsection
