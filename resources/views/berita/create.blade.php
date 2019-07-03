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
            <h4><strong>Form Berita </strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <form class="form-horizontal col-md-10 col-md-offset-1" enctype="multipart/form-data" method="POST" action="{{url('/home')}}">
                <fieldset>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>Judul Berita *</h5></label>
                        <input type="text" name="judul" class="form-control col-md-10" placeholder="Judul Berita...">
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>Isi Berita *</h5></label>
                        <textarea type="text" name="isi" class="form-control col-md-10" placeholder="Isi Berita..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5>File Berita</h5></label>
                        <input type="file" name="fileBerita" class="file form-control col-md-10">
                    </div>
                    <input type="hidden" name="id_user" value="{{Session('user')['id']}}">
                    <br>
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <div class="form-group has-warning pull-right">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambahkan Berita</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@section('moreScript')
    <script src="{{asset('src/js/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

@endsection