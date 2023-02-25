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
                  <label for="exampleInputUsername1">Nama Lengkap:</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                </div>

                <div class="form-group">
                  <label for="exampleInputUsername1">Alamat:</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                </div>

                <fieldset class="form-group">
                  <label for="">Jenis Kelamin<i class="text-danger" style="font-size: 14px;">*</i></label>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki">
                      <label class="form-check-label" for="laki-laki">
                        Laki-laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                      <label class="form-check-label" for="perempuan">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="form-group">
                  <label for="exampleInputUsername1">Telp:</label>
                  <input type="number" class="form-control" name="telp" id="telp" placeholder="Telepon">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Tahun Terdaftar:</label>
                  <input type="number" class="form-control" name="tahun" id="tahun" placeholder="Tahun Terdaftar">
                </div>

                <div class="form-group">
                  <label for="exampleInputUsername1">Pilih Kab/Kota:</label>
                  <select name="regency" id="regency" class="form-control">
                    <option value="">-- Pilih Kab/Kota --</option>
                    @foreach($regencys as $regency)
                    <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputUsername1">Pilih Sabuk:</label>
                  <select name="sabuk" id="sabuk" class="form-control">
                    <option value="">-- Pilih Sabuk --</option>
                    @foreach($sabuks as $sabuk)
                    <option value="{{ $sabuk->id }}">{{ $sabuk->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputUsername1">Pilih Dojeng:</label>
                  <select name="dojeng" id="dojeng" class="form-control">
                    <option value="">-- Pilih Dojeng --</option>
                    @foreach($dojengs as $dojeng)
                    <option value="{{ $dojeng->id }}">{{ $dojeng->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputUsername1">Foto:</label>
                  <input type="file" class="form-control" name="foto" id="foto" placeholder="Lampiran">
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
