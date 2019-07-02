{{--Header--}}
<div>
    <h4>Ujian Tugas Akhir</h4>
</div>

{{--Tanggal--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">Tanggal Ujian</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        <h6>{{date('d-m-Y', strtotime($detailta->ujianTA->jadwalUjian->tanggal))}} - Sesi : {{$detailta->ujianTA->jadwalUjian->sesi}}</h6>
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
        @if($detailta->ujianTA->nilai_angka == null)
            <h6>-</h6>
        @else
            <h6>{{$detailta->ujianTA->nilai_angka}}</h6>
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

{{--File--}}
<div class="row">
    <label class="col-md-2"><h6 class="pull-left">File Sidang</h6></label>
    <div class="col-md-1" style="text-align: right;">
        <h6>:</h6>
    </div>
    <div class="col-md-9">
        @if($detailta->ujianTA->file)
            <h6><a href="{{url(asset('storage/file_ta/'.$detailta->user->username.'_'.$detailta->id_ta.'/sidang_'.$detailta->user->username.'_'.$detailta->id_ta.'.pdf'))}}">{{'sidang_'.$detailta->user->username.'_'.$detailta->id_ta}}</a></h6>
        @else
            <h6>-<h6>
        @endif
    </div>
</div>

@if($detailta->ujianTA->file)
<div class="row">
    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#sidangUploadModal"><i class="glyphicon glyphicon-file"></i> Update File</button>
</div>
@else
<div class="row">
    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#sidangUploadModal"><i class="glyphicon glyphicon-file"></i> Tambahkan File</button>
</div>
@endif

<div class="modal fade" id="sidangUploadModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                <button type="button" class="close" data-dismiss="modal" style="color: #ffffff;">&times;</button>
                <h4 class="modal-title" style="color: #ffffff;"> Upload File Sidang</h4>
            </div>
            <div class="modal-body panel panel-body" style="margin-bottom: 0px; padding: 30px;">
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/sidang/uploadfile')}}" style="padding: 0px 20px;">
                    <div class="form-group alert alert-warning">
                        <h4>Perhatian</h4>
                        <p>File yang dapat diupload adalah file dengan ekstensi .pdf</p>
                        <p>Pastikan ukuran file yang diupload kurang dari 2MB</p>
                    </div>
                    <input type="text" name="idTA" style="display: none;" value="{{$detailta->id_ta}}">
                    <div class="form-group">
                        <label class="control-label"><h6>Select File</h6></label>
                        <input type="file" name="fileSidang" class="file col-md-12" style="height: 30px;" accept=".pdf">
                    </div>
                    <br>
                    <hr style="border-top: 1px solid #24292e;">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <div class="form-group" style="height: 30px;">
                        <button type="submit" class="btn btn-primary pull-right">Tambahkan File</button>
                        <button class="btn btn-default pull-right" style="margin-right: 10px;" data-dismiss="modal">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>