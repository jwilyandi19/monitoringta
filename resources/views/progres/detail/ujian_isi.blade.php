{{--Header--}}
<div>
    <h4>Ujian Tugas Akhir</h4>
</div>

{{--Tanggal--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Tanggal Seminar</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        <h6>{{$detailta->ujianTA->jadwalUjian->tanggal}} - Sesi : {{$detailta->ujianTA->jadwalUjian->sesi}}</h6>
    </div>
</div>

{{--Penguji Ujian 1--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 1</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->ujianTA->penguji1Ujian != null)
            <h6>{{$detailta->ujianTA->penguji1Ujian->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji Ujian 2--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 2</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->ujianTA->penguji2Ujian != null)
            <h6>{{$detailta->ujianTA->penguji2Ujian->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji Ujian 3--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 3</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->ujianTA->penguji3Ujian != null)
            <h6>{{$detailta->ujianTA->penguji3Ujian->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji Ujian 4--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 4</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->ujianTA->penguji4Ujian != null)
            <h6>{{$detailta->ujianTA->penguji4Ujian->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji Ujian 5--}}
@if($detailta->ujianTA->penguji5Ujian != null)
    <div class="row">
        <label class="col-md-2"><h6 class="pull-left">Penguji 5</h6></label>
        <div class="col-md-1" style="text-align: right;">
            <h6>:</h6>
        </div>
        <div class="col-md-9">
            <h6>{{$detailta->ujianTA->penguji5Ujian->nama}}</h6>
        </div>
    </div>
@endif

{{--Nilai Huruf--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Nilai</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->ujianTA->nilai == null)
            <h6>-</h6>
        @else
            <h6>{{$detailta->ujianTA->nilai}}</h6>
        @endif
    </div>
</div>

{{--Evaluasi--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->ujianTA->evaluasi == null)
            <h6>-</h6>
        @else
            <h6>{{$detailta->ujianTA->evaluasi}}</h6>
        @endif
    </div>
</div>