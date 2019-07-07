@extends('layout.main')

@section('title')
    Jadwal Ujian
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
            <h4><strong>List Jadwal Sidang</strong></h4>
            <hr>
        </div>
        <div class="form-group alert alert-dismissable alert-warning" style="margin-bottom: 0;">
            <button type="button" class="close fade" data-dismiss="alert">&times;</button>
            <h4>Perhatian</h4>
            <p><strong>Pastikan menambah jadwal sidang berada di antara jadwal Buka Pengajuan Jadwal Sidang dan jadwal Tutup Pengajuan Jadwal Sidang. Dan juga 
                di antara jadwal Buka Ketersediaan Sidang dan Tutup Ketersediaan Sidang.</strong></p>
            <p><strong>Jadwal Sidang tidak dapat dihapus jika masih ada Tugas Akhir yang terdapat dalam jadwal tersebut.</strong></p>
        </div>
        <div class="alert alert-warning center" style="text-align: center;">
            <h5>Tambahkan Tanggal Sidang Baru</h5>
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahUjian">Tambahkan Jadwal</button>
        </div>
        <div class="data-user">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center"><strong>No.</strong></th>
                    <th class="text-center"><strong>Tanggal</strong></th>
                    <th class="text-center"><strong>Aksi</strong></th>
                </tr>
                </thead>
                <tbody>
                @if($jadwal_ujians)
                    @foreach($jadwal_ujians as $key => $jadwal_ujian)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">{{date('d-m-Y',strtotime($jadwal_ujian->tanggal))}} (Ruang {{$jadwal_ujian->ruang}})</td>
                            <td class="text-center"><button class="btn btn-danger btn-sm" value="{{$jadwal_ujian->tanggal}}|{{$jadwal_ujian->ruang}}"><i class="glyphicon glyphicon-trash"></i> Hapus</button></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
        <div class="text-right">
            {{$jadwal_ujians->links()}}
        </div>
    </div>
    <div class="modal fade" id="tambahUjian">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ffffff;">&times;</button>
                    <h4 class="modal-title" style="color: #ffffff;"> Tambahkan Jadwal Sidang</h4>
                </div>
                <div class="modal-body panel panel-body" style="margin-bottom: 0px; padding: 30px;">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/jadwal/tambahujian')}}" style="padding: 0px 10px;">
                        <div class="form-group">
                            <label class="control-label col-md-3"><h6>Pilih Tanggal</h6></label>
                            <div class="col-md-9">
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><h6>Pilih Ruang</h6></label>
                            <div class="col-md-9">
                                <input type="number" name="ruang" min="1" max="3" class="form-control">
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #24292e;">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <div class="form-group" style="height: 30px;">
                            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Tambahkan Tanggal</button>
                            <button class="btn btn-default pull-right" style="margin-right: 10px;" data-dismiss="modal">Batal</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <form id="hapusUjian" action="{{url('/jadwal/ujianhapus')}}" method="POST" style="display: none;">
        {{csrf_field()}}
        {{method_field('POST')}}
        <input type="date" name="tanggalPilihan" id="inpTanggalPilihan">
        <input type="number" name="ruang" id="inpRuang">
    </form>
@endsection

@section('moreScript')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click', '.btn-danger', function(){
        var inp = $(this).attr('value');
        var res = inp.split("|");
        var tanggal = res[0];
        var ruang = res[1];
        console.log(tanggal);
        console.log(ruang);

        swal({
            title: "Perhatian",
            text: "Apakah anda yakin ingin menghapus jadwal Sidang berikut ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Batal"
        },
        function(){
            $('#inpTanggalPilihan').val(tanggal);
            $('#inpRuang').val(ruang);
            $('#hapusUjian').submit();
        });
    });
</script>
@endsection