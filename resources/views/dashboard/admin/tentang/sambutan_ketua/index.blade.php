@extends('dashboard.layouts.master')

@section('title', 'Sambutan Ketua Umum')

@push('style')

@endpush

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Sambutan Ketua Umum</h3>
        <p class="text-subtitle text-muted">For user to check they list</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sambutan Ketua Umum</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-4 mb-xl-0">
    <div class="card">
      <div class="card-body">
        {{-- <h4 class="card-title">Sambutan:</h4> --}}
        <form action="{{ route('sambutan.update', '1') }}" method="POST">
          @csrf
          <div class="form-group">
            <textarea class="form-control" id="body" placeholder="Enter the Description" name="body">{{ $data->body }}</textarea>
          </div>
          <button type="submit" class="btn btn-success"> Simpan </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script>
  ClassicEditor
    .create(document.querySelector('#body'))
    .catch(error => {
      console.error(error);
    });

</script>
@endpush
