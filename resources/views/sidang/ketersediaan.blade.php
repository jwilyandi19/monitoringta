@extends('layout.main')

@section('title')
    Ketersediaan Sidang Dosen
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
            <h4><strong>Ketersediaan Jadwal Ujian</strong></h4>
            <hr>
        </div>
        <div class="alert alert-warning">
            <h4>Perhatian</h4>
            <p>Berikut merupakan form ketersediaan jadwal seminar dosen, dengan menekan tombol sesi anda dinyatakan bersedia untuk mengikuti seminar pada sesi dan tanggal yang terpilih </p>
            <br>
            <div class="center row" style="text-align: center;">
                <button class="col-md-offset-2 col-md-3 btn btn-default btn-xs sesi sesi-success"><p>Bersedia</p></button>
                <button class="col-md-offset-2 col-md-3 btn btn-default btn-xs sesi"><p>Tidak Bersedia</p></button>
            </div>
        </div>
        <div class="">
            <div class="" style="height: <?php echo 170*((int)(count($tanggalUjians)/5) + 1)?>px; width: 100%;">
                @foreach($tanggalUjians as $key => $tanggalUjian)
                    <div class="kotak-tanggal">
                        <div class="panel tanggal">
                            <p><strong>{{$tanggalUjian['hari'].", ".$tanggalUjian['tanggal']}}</strong></p>
                        </div>
                        <div class="panel sesi-tanggal">
                            @foreach($tanggalUjian['sesi'] as $key => $sesi)
                                @if(isset($ketersediaanDosen[$tanggalUjian['tanggal']][$key]) && $ketersediaanDosen[$tanggalUjian['tanggal']][$key] == 1)
                                    <button id="tombolBersedia" class="btn btn-default btn-xs btn-block sesi sesi-success" value="{{$sesi}}"><p>sesi {{$key}}</p></button>
                                @else
                                    <button id="tidakBersedia" class="btn btn-default btn-xs btn-block sesi" value="{{$sesi}}"><p>sesi {{$key}}</p></button>
                                @endif
                            @endforeach
                        </div>   
                    </div>
                @endforeach
            </div>
        </div>
	</div>	
    <form id="mengisiKetersediaan" action="{{url('/mengisiketersediaanujian')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idJadwalUjian" id="inp-idJadwalMengisi">
    </form>
    <form id="batalkanKetersediaan" action="{{url('/batalkanketersediaanujian')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" name="idJadwalUjian" id="inp-idJadwalBatal">
    </form>
@endsection

@section('moreScript')
<script type="text/javascript">
    $(document).on('click','#tidakBersedia',function(){
        var idJadwal = $(this).attr('value');
        $('#inp-idJadwalMengisi').val(idJadwal);
        $('#mengisiKetersediaan').submit();
    });
    $(document).on('click','#tombolBersedia',function(){
        var idJadwal = $(this).attr('value');
        $('#inp-idJadwalBatal').val(idJadwal);
        $('#batalkanKetersediaan').submit();
    });
</script>
@endsection

