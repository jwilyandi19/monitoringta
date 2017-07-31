
{{--Modal Ubah Nilai--}}
<div class="modal fade" id="seminarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                <h4 class="modal-title" style="color: #ffffff;">Nilai Seminar Tugas Akhir</h4>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('/seminar/nilai')}}">
                    <div class="form-group" >
                        <label class="col-md-2 control-label">Nilai</label>
                        <div class="col-md-10">
                            <select class="form-control" name="nilai">
                                @if($detailta->seminarTA->nilai == 'A')
                                    <option value="A" selected> A (Diterima dengan perbaikan)</option>
                                    <option value="B" > B (Diterima dengan perubahan judul)</option>
                                    <option value="C" > C (Ditolak)</option>
                                @elseif($detailta->seminarTA->nilai == 'B')
                                    <option value="A" > A (Diterima dengan perbaikan)</option>
                                    <option value="B" selected> B (Diterima dengan perubahan judul)</option>
                                    <option value="C" > C (Ditolak)</option>
                                @elseif($detailta->seminarTA->nilai == 'C')
                                    <option value="A" > A (Diterima dengan perbaikan)</option>
                                    <option value="B" > B (Diterima dengan perubahan judul)</option>
                                    <option value="C" selected> C (Ditolak)</option>
                                @else
                                    <option value="" selected >Nilai Seminar</option>
                                    <option value="A" > A (Diterima dengan perbaikan)</option>
                                    <option value="B" > B (Diterima dengan perubahan judul)</option>
                                    <option value="C" > C (Ditolak)</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="col-md-2 control-label">id seminar ta</label>
                        <div class="col-md-10">
                            <input type="text" name="id_seminar_ta" class="form-control" value="{{$detailta->seminarTA->id_seminar_ta}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Evaluasi</label>
                        <div class="col-md-10">
                            @if($detailta->seminarTA->evaluasi != null)
                                <textarea type="text" name="evaluasi" class="form-control">{{$detailta->seminarTA->evaluasi}}</textarea>
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