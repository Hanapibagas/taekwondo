@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@push('style')
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendors/iconly/bold.css">
@endpush

@section('content')
<div class="page-heading">
  {{-- <h3>Dashboard</h3> --}}
  <h3>Selamat Anda berhasi login sebagai Admin Provinsi</h3>
</div>
@endsection

@push('script')
<script src="{{ asset('dashboard') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/pages/dashboard.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/main.js"></script>
@endpush
