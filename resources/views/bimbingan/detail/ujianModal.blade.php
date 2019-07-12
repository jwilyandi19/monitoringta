{{--Modal Isi Nilai--}}
<div class="modal fade" id="ujianModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                <h4 class="modal-title" style="color: #ffffff;">Nilai Sidang Tugas Akhir</h4>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('/ujian/nilai')}}">

                    @if($penguji1)
                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji (Pembimbing 1)</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji1 != null)
                                <input type="text" name="nilai" class="form-control" value="{{$detailta->ujianTA->nilai_penguji1}}">
                                <input type="hidden" name="status" value="1"> 
                            @else
                                <input type="text" name="nilai" class="form-control" placeholder="Angka Nilai Sidang">
                                <input type="hidden" name="status" value="1"> 
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($penguji2)
                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji (Pembimbing 2)</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji2 != null)
                                <input type="text" name="nilai" class="form-control" value="{{$detailta->ujianTA->nilai_penguji2}}">
                                <input type="hidden" name="status" value="2"> 
                            @else
                                <input type="text" name="nilai" class="form-control" placeholder="Angka Nilai Sidang">
                                <input type="hidden" name="status" value="2"> 
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($penguji3)
                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji3 != null)
                                <input type="text" name="nilai" class="form-control" value="{{$detailta->ujianTA->nilai_penguji3}}">
                                <input type="hidden" name="status" value="3"> 
                            @else
                                <input type="text" name="nilai" class="form-control" placeholder="Angka Nilai Sidang">
                                <input type="hidden" name="status" value="3"> 
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($penguji4)
                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai Penguji</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->nilai_penguji4 != null)
                                <input type="text" name="nilai" class="form-control" value="{{$detailta->ujianTA->nilai_penguji4}}">
                                <input type="hidden" name="status" value="4"> 
                            @else
                                <input type="text" name="nilai" class="form-control" placeholder="Angka Nilai Sidang">
                                <input type="hidden" name="status" value="4"> 
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($penguji5)
                        <div class="form-group" >
                            <label class="col-md-2 control-label">Nilai Penguji</label>
                            <div class="col-md-10">
                                @if($detailta->ujianTA->nilai_penguji5 != null)
                                    <input type="text" name="nilai" class="form-control" value="{{$detailta->ujianTA->nilai_penguji5}}">
                                    <input type="hidden" name="status" value="5"> 
                                @else
                                    <input type="text" name="nilai" class="form-control" placeholder="Angka Nilai Sidang">
                                    <input type="hidden" name="status" value="5"> 
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

                    <div class="form-group" style="display: none;">
                        <label class="col-md-2 control-label">Id Ujian TA</label>
                        <div class="col-md-10">
                            <input type="text" name="id_ta" class="form-control" value="{{$detailta->id_ta}}">
                        </div>
                    </div>

                    @if($penguji1 || $penguji2)
                    <div class="form-group">
                        <label class="col-md-2 control-label">Evaluasi</label>
                        <div class="col-md-10">
                            @if($detailta->ujianTA->evaluasi != null)
                                <textarea type="text" name="evaluasi" class="form-control">{{$detailta->ujianTA->evaluasi}}</textarea>
                            @else
                                <textarea type="text" name="evaluasi" class="form-control" placeholder="Evaluasi Sidang"></textarea>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;" >Simpan</button>
                        {{--<button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;">Tambahkan</button>--}}
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>