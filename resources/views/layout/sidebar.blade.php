@if(session('user'))
	<div class="panel panel-primary">
		<div class="panel-heading" >
			<h5 style="color: #ffffff; margin: 0 0">Informasi</h5>
		</div>
		<div class="panel-body list-group" style="padding: 1px;">
			
			<a href="{{url('/uploads/BUKU-PANDUAN-TUGAS-AKHIR-PRODI-SARJANA-TEKNIK-MATERIAL-FTI-ITS.pdf')}}" target="_blank" class="list-group-item">Panduan Tugas Akhir</a>
			
			
		</div>	
	</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading">
		<h5 style="color: #ffffff; margin: 0 0">Lain - Lain</h5>
	</div>
	<div class="panel-body list-group" style="padding: 1px;">
		<a href="http://material.its.ac.id/" target="_blank" class="list-group-item">Teknik Material dan Metalurgi</a>
	</div>	
</div>