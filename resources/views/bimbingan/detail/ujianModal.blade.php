{{--Modal Isi Nilai--}}
<div class="modal fade" id="ujianModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                <h4 class="modal-title" style="color: #ffffff;">Nilai Ujian Tugas Akhir</h4>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('/ujian/nilai')}}">

                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji 1</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji1 != null)
                                <input type="text" name="nilai1" class="form-control" value="{{$detailta->ujianTA->nilai_penguji1}}">
                            @else
                                <input type="text" name="nilai1" class="form-control" placeholder="Angka Nilai Ujian">
                            @endif
                        </div>
                    </div>

                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji 2</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji2 != null)
                                <input type="text" name="nilai2" class="form-control" value="{{$detailta->ujianTA->nilai_penguji2}}">
                            @else
                                <input type="text" name="nilai2" class="form-control" placeholder="Angka Nilai Ujian">
                            @endif
                        </div>
                    </div>

                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji 3</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji3 != null)
                                <input type="text" name="nilai3" class="form-control" value="{{$detailta->ujianTA->nilai_penguji3}}">
                            @else
                                <input type="text" name="nilai3" class="form-control" placeholder="Angka Nilai Ujian">
                            @endif
                        </div>
                    </div>

                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji 4</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji4 != null)
                                <input type="text" name="nilai4" class="form-control" value="{{$detailta->ujianTA->nilai_penguji4}}">
                            @else
                                <input type="text" name="nilai4" class="form-control" placeholder="Angka Nilai Ujian">
                            @endif
                        </div>
                    </div>

                    @if($detailta->ujianTA->penguji5Ujian!=null)
                        <div class="form-group" >
                            <label class="col-md-2 control-label">Nilai Penguji 5</label>
                            <div class="col-md-10">
                                @if($detailta->ujianTA->nilai_penguji5 != null)
                                    <input type="text" name="nilai5" class="form-control" value="{{$detailta->ujianTA->nilai_penguji5}}">
                                @else
                                    <input type="text" name="nilai5" class="form-control" placeholder="Angka Nilai Ujian">
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="form-group" style="display: none;">
                        <label class="col-md-2 control-label">Id Ujian TA</label>
                        <div class="col-md-10">
                            <input type="text" name="id_ujian_ta" class="form-control" value="{{$detailta->ujianTA->id_ujian_ta}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Evaluasi</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->evaluasi != null)
                                <textarea type="text" name="evaluasi" class="form-control">{{$detailta->ujianTA->evaluasi}}</textarea>
                            @else
                                <textarea type="text" name="evaluasi" class="form-control" placeholder="Evaluasi Seminar"></textarea>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;" >Nilai</button>
                        {{--<button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;">Tambahkan</button>--}}
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>