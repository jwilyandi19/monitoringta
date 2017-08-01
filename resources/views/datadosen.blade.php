@extends('layout.main')

@section('title')
    Data Dosen
@endsection

@section('moreStyle')
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
        <div class="alert alert-dismissable alert-success"> <!-- style="color:white; background-color: green; font-weight:bold; padding: 0.5em" -->
           <button type="button" class="close fade" data-dismiss="alert">&times;</button>
           {{Session::get('message')}}
        </div>
    @endif
	<div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
		<div class="judul-halaman">
            <h4><strong>Data Dosen</strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <div class="col-md-10 col-md-offset-1">
                <div class="">
                    <div class="col-md-3">
                        <h6>NIP</h6>
                    </div>
                    <div class="col-md-1 text-right">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-8">
                        <h6>{{$dosen->nip}}</h6>
                    </div>
                </div>
                <div class="">
                    <div class="col-md-3">
                        <h6>Nama</h6>
                    </div>
                    <div class="col-md-1 text-right">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-8">
                        <h6>{{$dosen->nama}}</h6>
                    </div>
                </div>
                <div class="">
                    <div class="col-md-3">
                        <h6>Nama Lengkap</h6>
                    </div>
                    <div class="col-md-1 text-right">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-8">
                        <h6>{{$dosen->nama_lengkap}}</h6>
                    </div>
                </div>
                <div class="">
                    <div class="col-md-3">
                        <h6>Bidang Keahlian</h6>
                    </div>
                    <div class="col-md-1 text-right">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-8">
                        <table class="">
                            <tbody>
                                @if($dosen->bidangs)
                                    @foreach($dosen->bidangs as $key => $bidang)
                                        <tr>
                                            <td class="col-md-5"><h6>{{$bidang->bidang->nama_bidang}}</h6></td>
                                            <td class="col-md-3 text-center">
                                                <button class="btn btn-danger btn-block btn-sm" value="{{$bidang->bidang->id_bidang_mk}}">Hapus Bidang</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                @if(count($bidangs) > count($dosen->bidangs))
                                    <tr>
                                        <form method="POST" action="{{url('/tambahkanbidang')}}">
                                            <td class="col-md-5">
                                                <select class="form-control" name="bidangMK">
                                                    <option value="">Pilih Bidang</option>
                                                    @foreach($bidangs as $keys => $bidang)
                                                        <option value="{{$bidang->id_bidang_mk}}">{{$bidang->nama_bidang}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="col-md-3 text-center">
                                                {{csrf_field()}}
                                                {{method_field('POST')}}
                                                <button  type="submit" class="btn btn-primary btn-block btn-sm">Tambahkan Bidang</button>
                                            </td>
                                        </form>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <form id="hapusBidang" method="POST" action="{{url('/hapusbidang')}}" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idBidangMK" id="inpIdBidangHapus">
    </form>	
@endsection

@section('moreScript')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-danger').click(function(){
            var idBidang = $(this).attr('value');

            swal({
                title: "Perhatian",
                text: "Apakah anda yakin ingin menghapus bidang keahlian anda ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            },
            function(){
                $('#inpIdBidangHapus').val(idBidang);
                $('#hapusBidang').submit();
            });
        });
    });
</script>
@endsection

