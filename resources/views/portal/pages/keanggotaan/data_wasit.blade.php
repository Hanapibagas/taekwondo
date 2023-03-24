@extends('portal.layouts.master')

@section('title', 'Data Wasit')

@push('style')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Data Wasit</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Keanggotaan</li>
        <li>Data Wasit</li>
      </ul>
    </div>
  </div>
  <div class="dot-shape1"><img src="{{ asset('portal') }}/assets/img/shape/dot1.png" alt="image"></div>
  <div class="dot-shape2"><img src="{{ asset('portal') }}/assets/img/shape/dot2.png" alt="image"></div>
  <div class="dot-shape3"><img src="{{ asset('portal') }}/assets/img/shape/dot3.png" alt="image"></div>
  <div class="dot-shape4"><img src="{{ asset('portal') }}/assets/img/shape/dot4.png" alt="image"></div>
  <div class="dot-shape5"><img src="{{ asset('portal') }}/assets/img/shape/dot5.png" alt="image"></div>
  <div class="dot-shape6"><img src="{{ asset('portal') }}/assets/img/shape/dot6.png" alt="image"></div>
  <div class="dot-shape7"><img src="{{ asset('portal') }}/assets/img/shape/dot1.png" alt="image"></div>
  <div class="shape16"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
  <div class="shape17"><img src="{{ asset('portal') }}/assets/img/shape/14.svg" alt="image"></div>
  <div class="shape18"><img src="{{ asset('portal') }}/assets/img/shape/15.png" alt="image"></div>
  <div class="shape19"><img src="{{ asset('portal') }}/assets/img/shape/16.png" alt="image"></div>
  <div class="shape20"><img src="{{ asset('portal') }}/assets/img/shape/14.svg" alt="image"></div>
</div>

<div class="container>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Status Wasit</th>
        <th>Kelas</th>
        <th>DAN</th>
        <th>PWN</th>
        <th>DWN</th>
        <th>PWD</th>
        <th>DWD</th>
      </tr>
    </thead>
    <tbody>
      @php
      $no = 1;
      @endphp
      @foreach($data as $wasit)
      <tr>
        <td>{{ $no }}</td>
        <td><img src="{{ asset('storage/images/wasit/' . $wasit->foto) }}" alt="" style="width: 100px; height: 100px;"></td>
        <td>{{ $wasit->nama }}</td>
        <td>{{ $wasit->status_wasit }}</td>
        <td>{{ $wasit->kelas }}</td>
        <td>{{ $wasit->dan }}</td>
        <td>{{ $wasit->pwn }}</td>
        <td>{{ $wasit->dwn }}</td>
        <td>{{ $wasit->pwd }}</td>
        <td>{{ $wasit->dwd }}</td>
      </tr>
      @php
      $no++;
      @endphp
      @endforeach
    </tbody>
  </table>
</div>

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

</script>
@endpush
