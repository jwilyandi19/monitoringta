@extends('layout.main')

@section('title')
Home
@endsection

@section('moreStyle')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- 	 -->
<!-- <link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" /> -->
<link rel="stylesheet" href="{{asset('css/bootstrap-material-datetimepicker.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> -->
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>

@endsection

@section('content')
	<div class="panel" style="height: 500px; margin-left: auto; margin-right: auto; padding-left: 15px; padding-right: 15px;">
		INI HALAMAN HOME
	</div>	
@endsection

@section('moreScript')
<script type="text/javascript">
	
</script>
@endsection

