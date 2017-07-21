@extends('layout.main')

@section('title')
    Home
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
            <h4><strong>List Data User</strong></h4>
            <hr>
        </div>
        <div class="data-user">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-md-1 text-center"><strong>id user</strong></th>
                    <th class="col-md-3 text-center"><strong>Username</strong></th>
                    <th class="col-md-6 text-center"><strong>Nama</strong></th>
                    <th class="col-md-2 text-center"><strong>Peran</strong></th>
                    <th class="text-center"><strong>Aksi</strong></th>
                </tr>
                </thead>
                <tbody>
                @if($users)
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{$user->id_user}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->nama}}</td>
                            @if($user->role == 1)
                                <td class="text-center">Mahasiswa</th>
                            @elseif($user->role == 2)
                                <td class="text-center">Dosen</th>
                            @else
                                <td class="text-center">Koordinator TA</th>
                            @endif
                            <td><a class="btn btn-info btn-sm" href="{{url('/user/'.$user->id_user)}}">Detail</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="text-right">
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection