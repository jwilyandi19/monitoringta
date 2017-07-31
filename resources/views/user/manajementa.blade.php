@extends('layout.main')

@section('title')
    Manajemen TA
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
                                <td class="text-center">{{$tugasAkhir->seminarTA->nilai}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif
                            
                            @if($tugasAkhir->ujianTA && $tugasAkhir->ujianTA->nilai)
                                <td class="text-center">{{$tugasAkhir->ujianTA->nilai}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif

                            <td>
                                <div class="text-center">
                                    <button class="btn btn-block btn-danger btn-xs" value="{{$tugasAkhir->id_ta}}"><i class="glyphicon glyphicon-remove"></i></button>
                                    <button class="btn btn-block btn-primary btn-xs" value="{{$tugasAkhir->id_ta}}"><i class="glyphicon glyphicon-ok"></i></button>
                                    <a class="btn btn-block btn-info btn-xs" href="{{url('')}}"><i class="glyphicon glyphicon-align-justify"></i></a>        
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <form id="resetPassword" method="POST" action="{{url('/resetpass')}}" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="text" id="inpIdUser" name="idUser">
    </form>
@endsection

@section('moreScript')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#listTA').DataTable({

        });
        $('.btn-warning').click( function(){
            var idUser = $(this).attr('value');

            swal({
                title: "Perhatian",
                text: "Apakah anda yakin ingin mereset password dari user ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            },
            function(){
                $('#inpIdUser').val(idUser);
                $('#resetPassword').submit();
            });
        });
    });
</script>
@endsection