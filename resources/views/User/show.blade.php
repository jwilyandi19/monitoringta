@extends('layout.main')

@section('title')
    Detail Tugas Akhir
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
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close fade" data-dismiss="alert">&times;</button>
            {{Session::get('message')}}
        </div>
    @endif
    <div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
        <div class="judul-halaman">
            <h4><strong>Detail Data User</strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <div >
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">Username</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->username}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->nama}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Peran</h6></label>
                    <div class="col-md-10">
                        @if($user->role == 1)
                            <h6>: Mahaiswa</h6>
                        @elseif($user->role == 2)
                            <h6>: Dosen</h6>
                        @else
                            <h6>: Koordinator Tugas Akhir</h6>
                        @endif
                    </div>
                </div>

                <br>
            </div>
            @if($user->akunDosen!=null)
                <br>
                <hr>
                <div>
                    <h4>Data Dosen</h4>
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">NIP</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->akunDosen->nip}}</h6>
                    </div>
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->akunDosen->nama}}</h6>
                    </div>
                </div>
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">Nama Lengkap</h6></label>
                    <div class="col-md-10">
                        <h6>: {{$user->akunDosen->nama_lengkap}}</h6>
                    </div>
                </div>
            @endif

            <form id="hapus-user" action="{{url('/user/'.$user->id_user)}}" method="POST" >
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i>Hapus User</button>
            </form>
        </div>

    </div>


@endsection

@section('moreScript')
    {{--<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>--}}
    {{--<script type="text/javascript">--}}
{{--//        $(document).on('click', '.btn-success', function(){--}}
{{--//            var idTugasAkhir = $(this).attr('value');--}}
{{--//            console.log(idTugasAkhir);--}}
{{--//--}}
{{--//            swal({--}}
{{--//                    title: "Perhatian",--}}
{{--//                    text: "Apakah anda yakin ingin menerima permintaan bimbingan dari TA berikut ?",--}}
{{--//                    type: "warning",--}}
{{--//                    showCancelButton: true,--}}
{{--//                    confirmButtonText: "Ya, konfirmasi",--}}
{{--//                    cancelButtonText: "Batal"--}}
{{--//                },--}}
{{--//                function(){--}}
{{--//                    $('#inp-userHapus').val(idTugasAkhir);--}}
{{--//                    $('#konfirmasi-permintaan').submit();--}}
{{--//                });--}}
{{--//        });--}}
        {{--$(document).on('click', '.btn-danger', function(){--}}
            {{--var idUserHapus = $(this).attr('value');--}}
            {{--console.log(idUserHapus);--}}
            {{--swal({--}}
                    {{--title: "Perhatian",--}}
                    {{--text: "Apakah anda yakin ingin Menghapus User ini ?",--}}
                    {{--type: "warning",--}}
                    {{--showCancelButton: true,--}}
                    {{--confirmButtonText: "Ya, Hapus",--}}
                    {{--cancelButtonText: "Batal"--}}
                {{--},--}}
                {{--function(){--}}
                    {{--$('#inp-userHapus').val(idUserHapus);--}}
                    {{--$('#hapus-user').submit();--}}
                {{--});--}}
        {{--});--}}
    {{--</script>--}}

@endsection

