@extends('layout.main')

@section('title')
Pengajuan TA
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
            <h4><strong>Pengajuan Judul Tugas Akhir </strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <form class="form-horizontal col-md-10 col-md-offset-1" method="POST" action="{{url('/penagjuanta')}}">
                <fieldset>
                    <div class="form-group alert alert-dismissable alert-warning" style="margin-bottom: 0;">
                        <button type="button" class="close fade" data-dismiss="alert">&times;</button>
                        <p><strong>* harus diisi</strong></p>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="judulta"><h5>Judul Tugas Akhir *</h5></label>
                        <textarea type="text" name="judulta" id="judulta" class="form-control col-md-10" placeholder="Judul Tugas Akhir"></textarea>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="bidang"><h5>Bidang Matakuliah *</h5></label>
                        <select class="form-control" id="bidang" name="rmk">
                            <option class="selected" >Bidang Matakuliah</option>
                            <option value="1">Material Inovasi</option>
                            <option value="">Metalurgi</option>
                        </select>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="pembimbing1"><h5>Dosen Pembiming 1 *</h5></label>
                        <select class="form-control" id="pembimbing1">
                            <option selected >Pilih Dosen Pembimbing 1</option>
                            <option   value='051100114'>ABDUL MUNIF</option>
                            <option   value='510000001'>ADHATUS SOLICHAH AHMADIYAH</option>
                            <option   value='132137825'>AGUS ZAINAL ARIFIN</option>
                            <option   value='132318030'>AHMAD SAIKHU</option>
                            <option   value='132309746'>ANNY YUNIARTI</option>
                            <option   value='051100119'>ARYA YUDHI WIJAYA</option>
                            <option   value='051100116'>BAGUS JATI S</option>
                            <option   value='132296226'>BILQIS AMALIAH</option>
                            <option   value='132298829'>CHASTINE FATICHAH</option>
                            <option   value='132318029'>DANIEL O. SIAHAAN</option>
                            <option   value='132306430'>DARLIS HERUMURTI</option>
                            <option   value='132306545'>DIANA PURWITASARI</option>
                            <option   value='051100121'>DINI ADNI</option>
                            <option   value='999999999'>DOSEN LUAR</option>
                            <option   value='132163671'>DWI SUNARYONO</option>
                            <option   value='131285253'>F.X. ARUNANTO</option>
                            <option   value='132230429'>FAJAR BASKORO</option>
                            <option   value='130532048'>HANDAYANI TJANDRASA</option>
                            <option   value='131995764'>HARI GINARDI</option>
                            <option   value='051100099'>HENNING T.C</option>
                            <option   value='510000002'>HUDAN STUDIAWAN</option>
                            <option   value='132306543'>IMAM KUSWARDAYAN</option>
                            <option   value='131996151'>JOKO LIANTO B.</option>
                            <option   value='131411100'>MUCHAMMAD HUSNI</option>
                            <option   value='132125674'>NANIK SUCIATI</option>
                            <option   value='051100124'>NURUL FAJRIN</option>
                            <option   value='051100118'>RADITYO ANGGORO</option>
                            <option   value='051100123'>RIDHO RAHMAN</option>
                            <option   value='131570363'>RIYANARTO SARNO</option>
                            <option   value='051100122'>RIZKY JANUAR A</option>
                            <option   value='132320036'>ROYYANA MUSLIM I</option>
                            <option   value='132085802'>RULLY SOELAIMAN</option>
                            <option   value='132297166'>SARWOSRI</option>
                            <option   value='132103631'>SITI ROCHIMAH</option>
                            <option   value='130368610'>SUPENO DJANALI</option>
                            <option   value='132306296'>TOHARI AHMAD</option>
                            <option   value='132309747'>UMI LAILI YUHANA</option>
                            <option   value='132125657'>VICTOR HARIADI</option>
                            <option   value='132256272'>WASKITHO WIBISONO</option>
                            <option   value='051100115'>WIJAYANTI NURUL</option>
                        </select> 
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="pembimbing2"><h5>Dosen Pembiming 2</h5></label>
                        <select class="form-control" id="pembimbing2">
                            <option selected >Pilih Dosen Pembimbing 2</option>
                            <option   value='051100114'>ABDUL MUNIF</option>
                            <option   value='510000001'>ADHATUS SOLICHAH AHMADIYAH</option>
                            <option   value='132137825'>AGUS ZAINAL ARIFIN</option>
                            <option   value='132318030'>AHMAD SAIKHU</option>
                            <option   value='132309746'>ANNY YUNIARTI</option>
                            <option   value='051100119'>ARYA YUDHI WIJAYA</option>
                            <option   value='051100116'>BAGUS JATI S</option>
                            <option   value='132296226'>BILQIS AMALIAH</option>
                            <option   value='132298829'>CHASTINE FATICHAH</option>
                            <option   value='132318029'>DANIEL O. SIAHAAN</option>
                            <option   value='132306430'>DARLIS HERUMURTI</option>
                            <option   value='132306545'>DIANA PURWITASARI</option>
                            <option   value='051100121'>DINI ADNI</option>
                            <option   value='999999999'>DOSEN LUAR</option>
                            <option   value='132163671'>DWI SUNARYONO</option>
                            <option   value='131285253'>F.X. ARUNANTO</option>
                            <option   value='132230429'>FAJAR BASKORO</option>
                            <option   value='130532048'>HANDAYANI TJANDRASA</option>
                            <option   value='131995764'>HARI GINARDI</option>
                            <option   value='051100099'>HENNING T.C</option>
                            <option   value='510000002'>HUDAN STUDIAWAN</option>
                            <option   value='132306543'>IMAM KUSWARDAYAN</option>
                            <option   value='131996151'>JOKO LIANTO B.</option>
                            <option   value='131411100'>MUCHAMMAD HUSNI</option>
                            <option   value='132125674'>NANIK SUCIATI</option>
                            <option   value='051100124'>NURUL FAJRIN</option>
                            <option   value='051100118'>RADITYO ANGGORO</option>
                            <option   value='051100123'>RIDHO RAHMAN</option>
                            <option   value='131570363'>RIYANARTO SARNO</option>
                            <option   value='051100122'>RIZKY JANUAR A</option>
                            <option   value='132320036'>ROYYANA MUSLIM I</option>
                            <option   value='132085802'>RULLY SOELAIMAN</option>
                            <option   value='132297166'>SARWOSRI</option>
                            <option   value='132103631'>SITI ROCHIMAH</option>
                            <option   value='130368610'>SUPENO DJANALI</option>
                            <option   value='132306296'>TOHARI AHMAD</option>
                            <option   value='132309747'>UMI LAILI YUHANA</option>
                            <option   value='132125657'>VICTOR HARIADI</option>
                            <option   value='132256272'>WASKITHO WIBISONO</option>
                            <option   value='051100115'>WIJAYANTI NURUL</option>
                        </select> 
                    </div>
                    <br>
                    <div class="form-group has-warning">
                        <a href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Ajukan Judul</a>
                        <!-- <button href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Ajukan Judul</button> -->                        
                    </div>
                </fieldset>                
            </form>
        </div>
	</div>	
@endsection

@section('moreScript')

@endsection

