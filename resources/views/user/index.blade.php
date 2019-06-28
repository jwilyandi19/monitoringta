@extends('layout.main')

@section('title')
    List Data User
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
            <h4><strong>List Data User</strong></h4>
            <hr>
        </div>
        <div class="data-user">
            <table id="listUser" class="table table-striped">
                Hae
                <thead>
                <tr>
                    <th class="col-md-1 text-center"><strong>id user</strong></th>
                    <th class="col-md-3"><strong>Username</strong></th>
                    <th class="col-md-5"><strong>Nama</strong></th>
                    <th class="col-md-1 text-center"><strong>Peran</strong></th>
                    <th class="col-md-2 text-center"><strong>Aksi</strong></th>
                </tr>
                </thead>
                <tbody>
                @if($users)
                    @foreach($users as $key => $user)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->nama}}</td>
                            @if($user->role == 1)
                                <td class="text-center">Mahasiswa</th>
                            @elseif($user->role == 2)
                                <td class="text-center">Dosen</th>
                            @else
                                <td class="text-center">Koordinator TA</th>
                            @endif
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-warning btn-sm" value="{{$user->id_user}}"><i class="glyphicon glyphicon-repeat"></i></button>
                                    <a class="btn btn-info btn-sm" href="{{url('/user/'.$user->id_user)}}"><i class="glyphicon glyphicon-align-justify"></i></a>
                                    
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
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#listUser').DataTable({
            dom: 'l<"toolbar">frtip',
            initComplete: function(){
                $("div.toolbar").html('<button type="button" id="any_button">Click Me!</button>');           
            } 
        });
    });
</script>
<script>
        $('.btn-warning').click( function(){
            console.log("MASUK");
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
</script>
@endsection