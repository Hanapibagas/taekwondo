@extends('dashboard.layouts.master')

@section('title', 'Edit Berita | Dashboard')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Berita</h4>
        <p class="card-title">
        </p>
        <div class="row">
          <div class="col-12">
            <form id="form-tambah-edit" name="form-tambah-edit" enctype="multipart/form-data" method="post" action="{{ route('berita.update', $post->id) }}">
              @csrf
              {{-- <input type="hidden" name="id" id="id"> --}}
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Judul:</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="{{ $post->title }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Isi:</label>
                    <textarea class="form-control" name="desc" id="desc">{!! $post->desc !!}</textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Tanggal:</label>
                    <input type="date" class="form-control" name="tgl" id="tgl" value="{{ $post->tgl }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Gambar:</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <small class="text-danger"><i id="result"></i></small>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-sm" id="button-simpan">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script>
  ClassicEditor
    .create(document.querySelector('#desc'))
    .catch(error => {
      console.error(error);
    });

</script>

@endpush()
