@extends('layout.main')

@section('title')
    Detail Tugas Akhir
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
            <h4><strong>Detail Progres Tugas Akhir </strong></h4>
            <hr>
        </div>
        <div class="panel-body isi-halaman">
            <div class="form-group">
                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">NRP</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->user->username}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->user->nama}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Judul Tugas Akhir</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->judul}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 1</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->id_dosbing1!=null)
                            <h6>{{$detailta->dosbing1->nama_lengkap}}</h6>
                        @else
                            <h6>-</h6>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 2</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->id_dosbing2!=null)
                            <h6>{{$detailta->dosbing2->nama_lengkap}}</h6>
                        @else
                            <h6>-</h6>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">RMK</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->rmk->nama_rumpun}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Status</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{$detailta->status->keterangan}}</h6>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">File Proposal</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->file)
                            <h6><a href="{{url(asset('storage/file_ta/'.$detailta->user->username.'_'.$detailta->id_ta.'/'.$detailta->user->username.'_'.$detailta->id_ta.'.zip'))}}">{{$detailta->user->username.'_'.$detailta->id_ta}}</a></h6>
                        @else
                            <h6>-</h6>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h4>Progres Asistensi</h4>
                <div class="row">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Materi Asistensi</th>
                            <th>Dosen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($asistensis)
                            @foreach($asistensis as $key => $asistensi)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$asistensi->tanggal}}</td>
                                    <td>{{$asistensi->materi}}</td>
                                    <td>{{$asistensi->dosen->nama_lengkap}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div>
                    <h4>Seminar Tugas Akhir</h4>
                </div>
                @if($detailta->seminarTA == null)
                    <!-- Tanggal Seminar -->
                    <div class="row">
                        <label class="col-md-2"><h6 class="pull-left">Tanggal Seminar</h6></label>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>:</h6>
                        </div>
                        <div class="col-md-9">
                            <h6>{{date('d-m-Y', strtotime($detailta->seminarTA->jadwalSeminar->tanggal))}} - Sesi : {{$detailta->seminarTA->jadwalSeminar->sesi}}</h6>
                        </div>
                    </div>
                    @if($detailta->seminarTA->penguji1 != null)
                        <!-- Penguji 1 -->
                            <div class="row">
                                <label class="col-md-2"><h6 class="pull-left">Penguji 1</h6></label>
                                <div class="col-md-1" style="text-align: right;">
                                    <h6>:</h6>
                                </div>
                                <div class="col-md-9">
                                    <h6>{{$detailta->seminarTA->penguji1->nama}}</h6>
                                </div>
                            </div>
                    @endif
                    @if($detailta->seminarTA->penguji2 != null)
                        <!-- Penguji 2 -->
                            <div class="row">
                                <label class="col-md-2"><h6 class="pull-left">Penguji 2</h6></label>
                                <div class="col-md-1" style="text-align: right;">
                                    <h6>:</h6>
                                </div>
                                <div class="col-md-9">
                                    <h6>{{$detailta->seminarTA->penguji2->nama}}</h6>
                                </div>
                            </div>
                    @endif
                    @if($detailta->seminarTA->penguji3 != null)
                        <!-- Penguji 3 -->
                            <div class="row ">
                                <label class="col-md-2"><h6 class="pull-left">Penguji 3</h6></label>
                                <div class="col-md-1" style="text-align: right;">
                                    <h6>:</h6>
                                </div>
                                <div class="col-md-9">
                                    <h6>{{$detailta->seminarTA->penguji3->nama}}</h6>
                                </div>
                            </div>
                    @endif
                    @if($detailta->seminarTA->penguji4 != null)
                        <!-- Penguji 4 -->
                            <div class="row">
                                <label class="col-md-2"><h6 class="pull-left">Penguji 4</h6></label>
                                <div class="col-md-1" style="text-align: right;">
                                    <h6>:</h6>
                                </div>
                                <div class="col-md-9">
                                    <h6>{{$detailta->seminarTA->penguji4->nama}}</h6>
                                </div>
                            </div>
                        @endif
                        @if($detailta->seminarTA->penguji5 != null)
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
                @endif
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nilai</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->seminarTA->nilai == null)
                            <h6>-</h6>
                        @else
                            <h6>{{$detailta->seminarTA->nilai}}</h6>
                        @endif
                    </div>
                </div>
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
            </div>

            <hr>

            <div class="form-group">

                <div>
                    <h4>Ujian Tugas Akhir</h4>
                </div>

                @if($detailta->ujianTA->status == 1)
                    <!-- Tanggal Seminar -->
                    <div class="row">
                        <label class="col-md-2"><h6 class="pull-left">Tanggal Seminar</h6></label>
                        <div class="col-md-1" style="text-align: right;">
                            <h6>:</h6>
                        </div>
                        <div class="col-md-9">
                            <h6>{{date('d-m-Y', strtotime($detailta->ujianTA->jadwalUjian->tanggal))}} - Sesi : {{$detailta->ujianTA->jadwalUjian->sesi}}</h6>
                        </div>
                    </div>
                    @if($detailta->ujianTA->penguji1Ujian != null)
                        <!-- Penguji 1 -->
                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Penguji 1</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                <h6>{{$detailta->ujianTA->penguji1Ujian->nama}}</h6>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Nilai Penguji 1</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                @if($detailta->ujianTA->nilai_penguji1 == null)
                                    <h6>-</h6>
                                @else
                                    <h6>{{$detailta->ujianTA->nilai_penguji1}}</h6>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if($detailta->ujianTA->penguji2Ujian != null)
                        <!-- Penguji 2 -->
                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Penguji 2</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                <h6>{{$detailta->ujianTA->penguji2Ujian->nama}}</h6>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Nilai Penguji 2</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                @if($detailta->ujianTA->nilai_penguji2 == null)
                                    <h6>-</h6>
                                @else
                                    <h6>{{$detailta->ujianTA->nilai_penguji2}}</h6>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if($detailta->ujianTA->penguji3Ujian != null)
                        <!-- Penguji 3 -->
                        <div class="row ">
                            <label class="col-md-2"><h6 class="pull-left">Penguji 3</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                <h6>{{$detailta->ujianTA->penguji3Ujian->nama}}</h6>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Nilai Penguji 3</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                @if($detailta->ujianTA->nilai_penguji3 == null)
                                    <h6>-</h6>
                                @else
                                    <h6>{{$detailta->ujianTA->nilai_penguji3}}</h6>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if($detailta->ujianTA->penguji4Ujian != null)
                        <!-- Penguji 4 -->
                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Penguji 4</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                <h6>{{$detailta->ujianTA->penguji4Ujian->nama}}</h6>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Nilai Penguji 4</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                @if($detailta->ujianTA->nilai_penguji4 == null)
                                    <h6>-</h6>
                                @else
                                    <h6>{{$detailta->ujianTA->nilai_penguji4}}</h6>
                                @endif
                            </div>
                        </div>
                    @endif
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

                        <div class="row">
                            <label class="col-md-2"><h6 class="pull-left">Nilai Penguji 5</h6></label>
                            <div class="col-md-1" style="text-align: right;">
                                <h6>:</h6>
                            </div>
                            <div class="col-md-9">
                                @if($detailta->ujianTA->nilai_penguji5 == null)
                                    <h6>-</h6>
                                @else
                                    <h6>{{$detailta->ujianTA->nilai_penguji5}}</h6>
                                @endif
                            </div>
                        </div>
                    @endif
                @endif

                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nilai Angka</h6></label>
                    <div class="col-md-1" style="text-align: right;">
                        <h6>:</h6>
                    </div>
                    <div class="col-md-9">
                        @if($detailta->ujianTA->nilai == null)
                            <h6>-</h6>
                        @else
                            <h6>{{$detailta->ujianTA->nilai_angka}}</h6>
                        @endif
                    </div>
                </div>

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
            </div>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection

