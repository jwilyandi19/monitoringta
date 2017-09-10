@if(session('user'))
	<div class="panel panel-primary">
		<div class="panel-heading" >
			<h5 style="color: #ffffff; margin: 0 0">Informasi</h5>
		</div>
		<div class="panel-body list-group" style="padding: 1px;">
			@if(session('user')['role'] == 1)
				<a href="{{url('/uploads/Panduan_Aplikasi_Mahasiswa.pdf')}}" target ="_blank" class="list-group-item">Panduan Sistem Informasi Tugas Akhir</a>
			@elseif(session('user')['role'] == 2)
				<a href="{{url('/uploads/Panduan-Aplikasi-Dosen.pdf')}}" target="_blank" class="list-group-item">Panduan Sistem Informasi Tugas Akhir</a>
			@elseif(session('user')['role'] == 3)
				<a href="{{url('/uploads/Panduan-Aplikasi-Koordinator.pdf')}}" target="_blank" class="list-group-item">Panduan Sistem Informasi Tugas Akhir</a>
			@endif
			<a href="#" class="list-group-item">Panduan Tugas Akhir</a>
			<a href="#" class="list-group-item">Prosedur Tugas Akhir</a>
		</div>	
	</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading">
		<h5 style="color: #ffffff; margin: 0 0">Lain - Lain</h5>
	</div>
	<div class="panel-body list-group" style="padding: 1px;">
		<a href="http://material.its.ac.id/" target="_blank" class="list-group-item">Teknik Material dan Metalurgi</a>
		<a href="http://baak.its.ac.id/newsite/upload/KA_2017.pdf" target="_blank" class="list-group-item">Kalender Akademik ITS</a>
	</div>	
</div>