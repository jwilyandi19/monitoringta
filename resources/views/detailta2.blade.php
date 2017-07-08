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
            <div >
                                <div class="row" >
                    <label class="col-md-2"><h6 class="pull-left">NRP</h6></label>
                    <div class="col-md-10">
                        <h6>: 5114100046</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Nama</h6></label>
                    <div class="col-md-10">
                        <h6>: RARAS ANGGITA</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2"><h6 class="pull-left">Judul Tugas Akhir</h6></label>
                    <div class="col-md-10">
                        <h6>: Implementasi Aplikasi Manajemen API Berbasis Protokol REST Menggunakan Platform WSO2</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 1</h6></label>
                    <div class="col-md-10">
                        <h6>: RIZKY JANUAR AKBAR, S.Kom., M.Eng.</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Pembimbing 2</h6></label>
                    <div class="col-md-10">
                        <h6>: WIJAYANTI NURUL K.,S.Kom., M.Sc.</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">RMK</h6></label>
                    <div class="col-md-10">
                        <h6>: RPL</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">Status</h6></label>
                    <div class="col-md-10">
                        <h6>: Tunggu Seminar</h6> 
                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2"><h6 class="pull-left">File Proposal</h6></label>
                    <div class="col-md-10">
                        <h6>: -</h6> 
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div>
                <h4>Progres bimbingan</h4>
                <div class="">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Bimbingan</th>
                                <th>Tanggal</th>
                                <th>Materi Bimbingan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>12/Jan/2017</td>
                                <td>Perkenalan</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>21/Jan/2017</td>
                                <td>Research Plan</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>12/Feb/2017</td>
                                <td>Progress Research Bahan I</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>21/Feb/2017</td>
                                <td>Progress Research Bahan II</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#bimbinganModal">Tambahkan Bimbingan</button>
                <br>
            </div>
            <br>
            <hr>
            <div>
                <h4>Seminar Tugas Akhir</h4>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Nilai / Status</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#nilaiSeminar">Masukkan Nilai</button>
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr>
            <div>
                <h4>Sidang Tugas Akhir</h4>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Nilai / Status</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <div class="col-md-12">
                <label class="col-md-2"><h6 class="pull-left">Evaluasi</h6></label>
                <div class="col-md-10">
                    <h6>: -</h6>
                </div>
            </div>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#nilaiSidang">Masukkan Nilai</button>


        </div>
    </div>
    <div class="modal fade" id="bimbinganModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                    <h4 class="modal-title" style="color: #ffffff;">Detail Bimbingan</h4>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{url('#')}}">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tanggal</label>
                            <div class="col-md-10">
                                <input type="date" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Materi</label>
                            <div class="col-md-10">
                                <textarea type="text" name="username" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            {{csrf_field()}}
                            <a class="btn btn-primary pull-right" href="#" style="margin : 0 15px;" data-dismiss="modal">Tambahkan</a>
                            {{--<button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;">Tambahkan</button>--}}
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nilaiSeminar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                    <h4 class="modal-title" style="color: #ffffff;">Penilaian Seminar</h4>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{url('#')}}">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="status">Nilai / Status</label>
                            <div class="col-md-10" >
                                <select class="form-control" id="status">
                                    <option>Pilih Nilai / Status Tugas Akhir</option>
                                    <option>A (Diterima Dengan Perbaikan)</option>
                                    <option>B (Diterima Dengan Perubahan Judul)</option>
                                    <option>C (Ditolak)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Evaluasi</label>
                            <div class="col-md-10">
                                <textarea type="text" name="evaluasi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            {{csrf_field()}}
                            <a class="btn btn-primary pull-right" href="#" style="margin : 0 15px;" data-dismiss="modal">Tambahkan</a>
                            {{--<button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;">Tambahkan</button>--}}
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nilaiSidang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                    <h4 class="modal-title" style="color: #ffffff;">Penilaian Sida</h4>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{url('#')}}">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="status">Nilai / Status</label>
                            <div class="col-md-10" >
                                <select class="form-control" id="status">
                                    <option>Pilih Nilai / Status Tugas Akhir</option>
                                    <option>A (Diterima Dengan Perbaikan)</option>
                                    <option>B (Diterima Dengan Perubahan Judul)</option>
                                    <option>C (Ditolak)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Evaluasi</label>
                            <div class="col-md-10">
                                <textarea type="text" name="evaluasi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            {{csrf_field()}}
                            <a class="btn btn-primary pull-right" href="#" style="margin : 0 15px;" data-dismiss="modal">Tambahkan</a>
                            {{--<button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;">Tambahkan</button>--}}
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('moreScript')

@endsection

