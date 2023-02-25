<!-- Modal -->
<div class="modal fade" id="tambah-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="title"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card-body">
                    <form id="form-tambah-edit" name="form-tambah-edit" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" id="id"> --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Judul:</label>
                                    <input type="text" class="form-control" name="judul" id="judul">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Isi:</label>
                                    <textarea class="form-control" name="desc" id="desc"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tanggal:</label>
                                    <input type="date" class="form-control" name="tgl" id="tgl">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Gambar:</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <small class="text-danger"><i id="result"></i></small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="button-simpan"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
