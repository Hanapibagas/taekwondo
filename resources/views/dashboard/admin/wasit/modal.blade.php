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
                  <label for="nama">Nama Lengkap:</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="status_wasit">Status Wasit:</label> <br>
                  <select name="status_wasit" id="status_wasit" class="form-control">
                    <option>-- Pilih Status Wasit --</option>
                    <option value="Nasional">Internasional</option>
                    <option value="Nasional">Nasional</option>
                    <option value="Daerah">Daerah</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas:</label>
                  <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas">
                </div>
                <div class="form-group">
                  <label for="dan">DAN:</label>
                  <input type="text" class="form-control" name="dan" id="dan" placeholder="DAN">
                </div>
                <div class="form-group">
                  <label for="pwn">PWN:</label> <br>
                  {{-- <input type="text" class="form-control" name="pwn" id="pwn" placeholder="PWD"> --}}
                  <input type="radio" name="pwn" value="Ya" id="ya">
                  <lable for="ya">Ya</lable>
                  <input type="radio" name="pwn" value="Tidak" id="tidak">
                  <lable for="tidak">Tidak</lable>
                </div>
                <div class="form-group">
                  <label for="dwn">DWN</label> <br>
                  {{-- <input type="text" class="form-control" name="dwn" id="dwn" placeholder="dwn"> --}}
                  <input type="radio" name="dwn" value="Ya" id="ya">
                  <lable for="ya">Ya</lable>
                  <input type="radio" name="dwn" value="Tidak" id="tidak">
                  <lable for="tidak">Tidak</lable>
                </div>
                <div class="form-group">
                  <label for="pwd">PWD</label> <br>
                  {{-- <input type="text" class="form-control" name="pwd" id="pwd" placeholder="PWD"> --}}
                  <input type="radio" name="pwd" value="Ya" id="ya">
                  <lable for="ya">Ya</lable>
                  <input type="radio" name="pwd" value="Tidak" id="tidak">
                  <lable for="tidak">Tidak</lable>
                </div>
                <div class="form-group">
                  <label for="dwd">DWD</label> <br>
                  {{-- <input type="text" class="form-control" name="dwd" id="dwd" placeholder="DWD"> --}}
                  <input type="radio" name="dwd" value="Ya" id="ya">
                  <lable for="ya">Ya</lable>
                  <input type="radio" name="dwd" value="Tidak" id="tidak">
                  <lable for="tidak">Tidak</lable>
                </div>
                <div class="form-group">
                  <label for="foto">Foto:</label>
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
