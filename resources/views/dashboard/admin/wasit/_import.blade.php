<div class="modal fade" id="import-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="title-import"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body pt-0">
          <form action="{{ route('wasit.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
              <label for="file" class="form-label">Data Wasit:</label>
              <input type="file" class="form-control" id="file" name="data">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm" id="button-import-wasit"></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
