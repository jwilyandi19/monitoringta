{{--Header--}}
<div>
    <h4>Seminar Tugas Akhir</h4>
</div>

{{--Tanggal--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Tanggal Seminar</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        <h6>{{date('d-m-Y', strtotime($detailta->seminarTA->jadwalSeminar->tanggal))}} - Sesi : {{$detailta->seminarTA->jadwalSeminar->sesi}}</h6>
    </div>
</div>

{{--Penguji 1--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 1</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->seminarTA->penguji1 != null)
            <h6>{{$detailta->seminarTA->penguji1->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji 2--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 2</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->seminarTA->penguji2 != null)
            <h6>{{$detailta->seminarTA->penguji2->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji 3--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 3</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->seminarTA->penguji3 != null)
            <h6>{{$detailta->seminarTA->penguji3->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji 4--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Penguji 4</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->seminarTA->penguji4 != null)
            <h6>{{$detailta->seminarTA->penguji4->nama}}</h6>
        @else
            <h6>-</h6>
        @endif
    </div>
</div>

{{--Penguji 5 (kalau ada)--}}
@if($detailta->seminarTA->penguji5!=null)

    <div class="row">
        <label class="col-md-2"><h6 class="pull-left">Penguji 5</h6></label>
        <div class="col-md-1" style="text-align: right;">
            <h6>:</h6>
        </div>
        <div class="col-md-9">
            <h6>{{$detailta->seminarTA->penguji5->nama}}</h6>
        </div>
    </div>
@endif

{{--Nilai--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Status</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->seminarTA->nilai == null)
            <h6>-</h6>
        @else
            @if($detailta->seminarTA->nilai == 'A')
                <h6>Diterima dengan perbaikan</h6>
            @endif
            @if($detailta->seminarTA->nilai == 'B')
                <h6>Diterima dengan perubahan judul</h6>
            @endif
            @if($detailta->seminarTA->nilai == 'C')
                <h6>Ditolak</h6>
            @endif
        @endif
    </div>
</div>

<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Nilai</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        <h6>{{$detailta->seminarTA->nilai_angka}}</h6>
    </div>
</div>

{{--Evaluasi--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->seminarTA->evaluasi == null)
            <h6>-</h6>
        @else
            <h6>{{$detailta->seminarTA->evaluasi}}</h6>
        @endif
    </div>
</div>
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">File Seminar</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->seminarTA->file)
            <h6><a href="{{url(asset('storage/file_ta/'.$detailta->user->username.'_'.$detailta->id_ta.'/seminar_'.$detailta->user->username.'_'.$detailta->id_ta.'.pdf'))}}">{{'seminar_'.$detailta->user->username.'_'.$detailta->id_ta}}</a></h6>
        @else
            <h6>-<h6>
        @endif
    </div>
</div>

