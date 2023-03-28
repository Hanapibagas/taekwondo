<!-- Modal -->
<div class="modal fade" id="tambah-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Pelatih Utama:</label>
                                    <input type="text" class="form-control" name="pelatih" @error('pelatih') is-invalid
                                        @enderror" placeholder="Nama pelatih" name="pelatih" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Alamat Dojang:</label>
                                    <input type="text" class="form-control" name="alamat" @error('alamat') is-invalid
                                        @enderror" placeholder="Alamat" name="alamat" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Kabupaten/Kota:</label>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Kacamatan:</label>
                                    <select name="kacamatan" class="form-control" id="kacamatan">
                                        <option value="">Silahkan pilih</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Dojang:</label>
                                    <input type="text" class="form-control" name="name" @error('name') is-invalid
                                        @enderror" placeholder="Nama dojang" name="name" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">No.Hp/Wa:</label>
                                    <input type="text" class="form-control" name="kontak" @error('kontak') is-invalid
                                        @enderror" placeholder="No. Hp/Wa" name="kontak" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Deskripsi:</label>
                                    <textarea name="deskripsi" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Foto:</label>
                            <input type="file" class="form-control" name="foto" @error('foto') is-invalid @enderror"
                                name="foto" autocomplete="off">
                            <small class="text-danger"><i id="result"></i></small>
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
