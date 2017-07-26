@extends('layout.main')

@section('title')
Error
@endsection

@section('moreStyle')

@endsection

@section('content') 
    <div class="panel" style="margin-left: auto; margin-right: auto; padding : 30px;">
        <div class="judul-halaman">
            <h4><strong>Error </strong></h4>
            <hr>
        </div>
        @if (Session::get('message'))
            <div class="alert alert-danger">
                <h4><i class="glyphicon glyphicon-exclamation-sign"></i> Halaman Tidak Ditemukan</h4>
                <p>{{Session::get('message')}}</p>
            </div>
        @else
            <div class="alert alert-danger">
                <h4><i class="glyphicon glyphicon-exclamation-sign"></i> Halaman Tidak Ditemukan</h4>
                <p>Halaman tidak tersedia</p>
            </div>
        @endif
    </div>  
@endsection

@section('moreScript')

@endsection

