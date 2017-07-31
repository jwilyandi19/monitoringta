@extends('layout.main')

@section('title')
    Penguji Ujian
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
            <h4><strong>Penguji Ujian</strong></h4>
            <hr>
        </div>
        <div class="">
            <div class="" style="height: <?php echo 170*((int)(count($tanggalUjians)/5) + 1)?>px; width: 100%;">
                @foreach($tanggalUjians as $key => $tanggalUjian)
                    <div class="kotak-tanggal">
                        <div class="panel tanggal">
                            <p><strong>{{$tanggalUjian['hari'].", ".date('d-m-Y',strtotime($tanggalUjian['tanggal']))}}</strong></p>
                        </div>
                        <div class="panel sesi-tanggal">
                            @foreach($tanggalUjian['sesi'] as $keys => $sesi)
                                <a href="{{url('/formpengujiujian/'.$sesi)}}" class="btn btn-default btn-xs btn-block sesi"><p>sesi {{$keys}}</p></a>
                            @endforeach
                        </div>   
                    </div>
                @endforeach
            </div>
        </div>
    </div>  
@endsection

@section('moreScript')
@endsection

