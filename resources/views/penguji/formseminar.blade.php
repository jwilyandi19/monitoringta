@extends('layout.main')

@section('title')
    Form Penguji Seminar
@endsection

@section('moreStyle')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
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
        <div class="alert alert-dismissable alert-success">
           <button type="button" class="close fade" data-dismiss="alert">&times;</button>
           {{Session::get('message')}}
        </div>
    @endif
	<div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
		<div class="judul-halaman">
            <a class="btn btn-default pull-right" href="{{url('/pengujiseminar')}}">Kembali</a>
            <h4><strong>Pengajuan Penguji Seminar</strong></h4>
            <hr>
        </div>
        <div class="alert alert-warning">
            <div class="col-md-12">
                @if($jadwal->sesi > 1)
                    <div class="col-md-2 text-left">
                        <a href="{{url('/formpengujiseminar/'.($jadwal->id_js - 1))}}" class="btn btn-primary">Sesi {{$jadwal->sesi - 1}}</a>
                    </div>
                    <div class="col-md-8 text-center">
                @else
                    <div class="col-md-offset-2 col-md-8 text-center" style="vertical-align: center;">
                @endif
                    <h5>Hari {{$hari}}, Tanggal {{date('d-m-Y',strtotime($jadwal->tanggal))}} Ruang {{$jadwal->ruang}} Sesi {{$jadwal->sesi}}</h5>
                </div>
                @if($jadwal->sesi < 3)
                    <div class="col-md-2 text-right" style="vertical-align: center;">
                        <a href="{{url('/formpengujiseminar/'.($jadwal->id_js + 1))}}" class="btn btn-primary"> Sesi {{$jadwal->sesi + 1}}</a>
                    </div>
                @endif
            </div>
            <br>
            <br>
        </div>
        <hr>
        <div class="">
            <div class="text-center">
                <h5>Berikut daftar dosen yang bersedia pada jadwal ini</h5>
            </div>
            <div class="">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th class="text-center">Bidang</th>
                        <th class="text-center">Jumlah Menguji</th>
                    </thead>
                    <tbody>
                        @foreach($dosenBersedias as $key => $dosenBersedia)
                            <tr class="info">
                                <td class="text-center">{{$key+1}}</td>
                                <td>{{$dosenBersedia['nama_lengkap']}}</td>
                                <td class="text-center">{{$dosenBersedia['bidang']}}</td>
                                <td class="text-center">{{$dosenBersedia['menguji']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <hr>
            <div class="text-center">
                <h5>Berikut merupakan daftar TA yang sudah mendaftar pada jadwal ini</h5>
            </div>
            <div class="">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">NRP Mhs.</th>
                        <th class="text-center">Bidang</th>
                        <th class="">Judul TA</th>
                        <th class="text-center">Pembimbing1</th>
                        <th class="text-center">Pembimbing2</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @if($seminars)
                            @foreach($seminars as $keys => $seminar)
                                @if($seminar->status == 1)
                                    <tr class="success">
                                @elseif($keys < 6)
                                    <tr class="warning">
                                @else
                                    <tr>
                                @endif
                                    <td class="text-center">{{$keys+1}}</td>
                                    <td>{{$seminar->tugasAkhir->user->username}}</td>
                                    <td>{{$seminar->tugasAkhir->bidang->nama_bidang}}</td>
                                    <td>{{$seminar->tugasAkhir->judul}}</td>
                                    
                                    @if($seminar->tugasAkhir->dosbing1)
                                        <td>{{$seminar->tugasAkhir->dosbing1->nama}}</td>
                                    @else
                                        <td style="text-align: center;">-</td>
                                    @endif
                                    
                                    @if($seminar->tugasAkhir->dosbing2)
                                        <td>{{$seminar->tugasAkhir->dosbing2->nama}}</td>
                                    @else
                                        <td style="text-align: center;">-</td>
                                    @endif
                                    
                                    <td>
                                        @if($seminar->status == 0)
                                            <a class="btn btn-success btn-sm" value="{{$seminar->id_seminar_ta}}">Terima</a>
                                            <a class="btn btn-danger btn-sm" id="batalpengajuanseminartombol" value="{{$seminar->id_seminar_ta}}">Batalkan</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <hr style="">
            <div class="text-center">
                <h5>Berikut daftar TA yang sudah diterima di jadwal ini</h5>
            </div>
            <div class="">
                <table id="tabelIsiPenguji" class="table table-striped">
                    <thead>
                        <th class="text-center ">No</th>
                        <th class="text-center ">NRP</th>
                        <th class="text-center">Bidang</th>
                        <th >Judul</th>
                        <th class="text-center ">Penguji 1</th>
                        <th class="text-center ">Penguji 2</th>
                        <th class="text-center ">Penguji 3</th>
                        <th class="text-center ">Penguji 4</th>
                        <th class="text-center ">Penguji 5</th>
                        <th class="">Aksi</th>
                    </thead>
                    <tbody>
                        @if($seminarDiterimas)
                            @foreach($seminarDiterimas as $index => $seminarDiterima)
                                <tr>
                                    <form  action="{{url('/pengujiseminar/'.$seminarDiterima->id_seminar_ta)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('POST')}}
                                        
                                        <td>{{$index+1}}</td>
                                        <td>{{$seminarDiterima->tugasAkhir->user->username}}</td>
                                        <td>{{$seminarDiterima->tugasAkhir->bidang->nama_bidang}}</td>
                                        <td>{{$seminarDiterima->tugasAkhir->judul}}</td>
                                        <td>
                                            <select name="penguji1">
                                                @if(!$seminarDiterima->id_penguji1)
                                                    <option value="" selected="">Pilih Penguji 2</option>
                                                @endif
                                                @foreach($dosenBersedias as $key => $dosenBersedia)
                                                    @if($seminarDiterima->id_penguji1 == $dosenBersedia['id'])
                                                        <option value="{{$dosenBersedia['id']}}" selected>{{$dosenBersedia['nama']}}</option>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="penguji2">
                                                @if(!$seminarDiterima->id_penguji2)
                                                    <option value="" selected="">Pilih Penguji 2</option>
                                                @endif
                                                @foreach($dosenBersedias as $key => $dosenBersedia)
                                                    @if($seminarDiterima->id_penguji2 == $dosenBersedia['id'])
                                                        <option value="{{$dosenBersedia['id']}}" selected>{{$dosenBersedia['nama']}}</option>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="penguji3">
                                                @if(!$seminarDiterima->id_penguji3)
                                                    <option value="" selected="">Pilih Penguji 3</option>
                                                @endif
                                                @foreach($dosenBersedias as $key => $dosenBersedia)
                                                    @if($seminarDiterima->id_penguji3 == $dosenBersedia['id'])
                                                        <option value="{{$dosenBersedia['id']}}" selected>{{$dosenBersedia['nama']}}</option>
                                                    @else
                                                        <option value="{{$dosenBersedia['id']}}">{{$dosenBersedia['nama']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="penguji4">
                                                @if(!$seminarDiterima->id_penguji4)
                                                    <option value="" selected="">Pilih Penguji 4</option>
                                                @endif
                                                @foreach($dosenBersedias as $key => $dosenBersedia)
                                                    @if($seminarDiterima->id_penguji4 == $dosenBersedia['id'])
                                                        <option value="{{$dosenBersedia['id']}}" selected>{{$dosenBersedia['nama']}}</option>
                                                    @else
                                                        <option value="{{$dosenBersedia['id']}}">{{$dosenBersedia['nama']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="penguji5">
                                                @if(!$seminarDiterima->id_penguji5)
                                                    <option value="" selected="">Pilih Penguji 5</option>
                                                @endif
                                                @foreach($dosenBersedias as $key => $dosenBersedia)
                                                    @if($seminarDiterima->id_penguji5 == $dosenBersedia['id'])
                                                        <option value="{{$dosenBersedia['id']}}" selected>{{$dosenBersedia['nama']}}</option>
                                                    @else
                                                        <option value="{{$dosenBersedia['id']}}">{{$dosenBersedia['nama']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-block btn-info btn-sm">Simpan</button>
                                                <a id="batalseminartombol" class="btn btn-block btn-danger btn-sm" value="{{$seminarDiterima->id_seminar_ta}}">Batalkan</a>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <hr>
                <a class="btn btn-default" href="{{url('/pengujiseminar')}}">Kembali</a>
            </div>
        </div>
	</div>
    <form id="terimaSeminar" action="{{url('/terimapengajuanseminar')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idJadwalSeminar" value="{{$jadwal->id_js}}">
        <input type="text" name="idSeminarTA" id="inpSeminarDiterima">
    </form>
    <form id="batalkanSeminar" action="{{url('/batalkanseminar')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idJadwalSeminar" value="{{$jadwal->id_js}}">
        <input type="text" name="idSeminarTA" id="inpSeminarDitolak">
    </form>
    <form id="batalkanPengajuan" action="{{url('/batalkanpengajuanseminar')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idJadwalSeminar" value="{{$jadwal->id_js}}">
        <input type="text" name="idSeminar" id="inpSeminarDibatalkan">
    </form>
@endsection

@section('moreScript')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#tabelIsiPenguji').DataTable({
            "scrollX" : true,
            "autoWidth" : true,
            "columnDefs" : [
                { 
                    "targets" : 3, 
                    "width" : "400px"
                }
            ],
            "paging" : false,
            "info" : false,
            "searching" : false,
            "ordering" : false,
        });
    });
        $('.btn-success').click(function(){
            var idSeminarTA = $(this).attr('value');

            swal({
                title: "Perhatian",
                text: "Apakah anda yakin ingin menerima pengajuan jadwal seminar dari TA berikut ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Terima",
                cancelButtonText: "Batal"
            },
            function(){
                $('#inpSeminarDiterima').val(idSeminarTA);
                $('#terimaSeminar').submit();
            });
        });
        $('#batalseminartombol').click(function(){
            var idSeminarTA = $(this).attr('value');

            swal({
                title: "Perhatian",
                text: "Apakah anda yakin ingin membatalkan penerimaan pengajuan jadwal dari TA ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            },
            function(){
                $('#inpSeminarDitolak').val(idSeminarTA);
                $('#batalkanSeminar').submit();
            });
        });
        $('#batalpengajuanseminartombol').click(function(){
            var idSeminarTA = $(this).attr('value');
            
            swal({
                title: "Perhatian",
                text: "Apakah anda yakin ingin membatalkan pengajuan jadwal seminar?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Batalkan",
                cancelButtonText: "Batal"
            },
            function(){
                $('#inpSeminarDibatalkan').val(idSeminarTA)
                $('#batalkanPengajuan').submit();
            });
        });
</script>
@endsection

