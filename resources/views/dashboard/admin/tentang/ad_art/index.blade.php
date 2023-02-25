@extends('dashboard.layouts.master')

@section('title', 'AD ART')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Ad Art</h3>
        <p class="text-subtitle text-muted">For user to check they list</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">AD ART</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 mt-3 mb-xl-0">
    <div class="card">
      <div class="card-body">
        <p class="">Upload AD ART:</p>
        <form action="{{ route('ad.update', '1') }}" method="POST" enctype="multipart/form-data">
          @csrf
          {{-- <div class="form-group">
            <input type="file" name="file" class="file-upload-default">
          </div> --}}
          <div class="form-group mb-4">
            <input type="file" class="form-control" name="file">
            <small class="text-danger"><i id="result"></i></small>
          </div>
          <button type="submit" class="btn btn-success"> Upload </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
