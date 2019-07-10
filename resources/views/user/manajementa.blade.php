@extends('layout.main')

@section('title')
    Manajemen TA
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
        <div class="alert alert-dismissable alert-success"> <!-- style="color:white; background-color: green; font-weight:bold; padding: 0.5em" -->
            <button type="button" class="close fade" data-dismiss="alert">&times;</button>
            {{Session::get('message')}}
        </div>
    @endif
    <div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
        <div class="judul-halaman">
            <h4><strong>Manajemen TA</strong></h4>
            <hr>
        </div>
        <div class="data-user">
            <table id="listTA" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center"><strong>ID TA</strong></th>
                    <th class="text-center"><strong>NRP</strong></th>
                    <th class=""><strong>Nama</strong></th>
                    <th class=""><strong>Judul</strong></th>
                    <th class="text-center"><strong>Nilai Seminar</strong></th>
                    <th class="text-center"><strong>Nilai Sidang</strong></th>
                    <th class="text-center"><strong>Aksi</strong></th>
                </tr>
                </thead>
                <tbody>
                @if($tugasAkhirs)
                    @foreach($tugasAkhirs as $key => $tugasAkhir)
                        <tr>
                            <td class="text-center">{{$tugasAkhir->id_ta}}</td>
                            <td>{{$tugasAkhir->user->username}}</td>
                            <td>{{$tugasAkhir->user->nama}}</td>
                            <td>{{$tugasAkhir->judul}}</td>
                            
                            @if($tugasAkhir->seminarTA && $tugasAkhir->seminarTA->nilai)
                                <td class="text-center">{{$tugasAkhir->seminarTA->nilai_angka}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif
                            
                            @if($tugasAkhir->ujianTA && $tugasAkhir->ujianTA->nilai)
                                <td class="text-center">{{$tugasAkhir->ujianTA->nilai_angka}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif

                            <td>
                                <div class="text-center">
                                    <button class="btn btn-block btn-danger btn-xs" value="{{$tugasAkhir->id_ta}}"><i class="glyphicon glyphicon-remove"></i></button>
                                    <button class="btn btn-block btn-primary btn-xs" value="{{$tugasAkhir->id_ta}}"><i class="glyphicon glyphicon-ok"></i></button>
                                    <a class="btn btn-block btn-info btn-xs" href="{{url('/detailta/'.$tugasAkhir->id_ta)}}"><i class="glyphicon glyphicon-align-justify"></i></a>
                                    <a class="btn btn-block btn-warning btn-xs" href="{{url('/progres')}}/{{$tugasAkhir->id_ta}}/edit"><i class="glyphicon glyphicon-cog"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <form id="tidakLulus" method="POST" action="{{url('/tidaklulus')}}" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" id="inpTidakLulus" name="idTA">
    </form>
    <form id="dinyatakanLulus" method="POST" action="{{url('/dinyatakanlulus')}}" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" id="inpLulus" name="idTA">
    </form>
@endsection

@section('moreScript')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#listTA').DataTable({

        });
    });
    $('.btn-danger').click( function(){
        var idTA = $(this).attr('value');
        console.log(idTA);
        swal({
            title: "Perhatian",
            text: "Apakah anda yakin menyatakan bahwa TA ini dinyatakan tidak lulus ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Konfirmasi",
            cancelButtonText: "Batal"
        },
        function(){
            $('#inpTidakLulus').val(idTA);
            $('#tidakLulus').submit();
        });
    });
    $('.btn-primary').click(function(){
        var idTA = $(this).attr('value');
        console.log(idTA);
        swal({
            title: "Perhatian",
            text: "Apakah anda yakin menyatakan bahwa TA ini dinyatakan lulus ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Konfirmasi",
            cancelButtonText: "Batal"
        },
        function(){
            $('#inpLulus').val(idTA);
            $('#dinyatakanLulus').submit();
        });            
    });
</script>
@endsection