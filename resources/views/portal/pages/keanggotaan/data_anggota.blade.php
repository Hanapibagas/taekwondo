@extends('portal.layouts.master')

@section('title', 'Data Anggota')

@push('style')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Data Anggota</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Keanggotaan</li>
        <li>Data Anggota</li>
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


<div class="container mb-5 style-kalfin">
  {{-- <select name="kab" id="kab" onchange="myFunction()">
    <option value="">-- Pilih Kab/Kota --</option>
    @foreach ($regencys as $regency)
    <option value="{{ $regency->id }}">{{ $regency->name }}</option>
  @endforeach
  </select> --}}
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Telp</th>
        <th>Tahun Terdaftar</th>
        <th>Kab/Kota</th>
        <th>Sabuk</th>
        <th>Dojang</th>
        <th>Foto</th>
      </tr>
    </thead>
    <tbody>
      @php
      $no=1;
      @endphp
      @foreach($anggotas as $anggota)
      <tr>
        <td>{{ $no}}</td>
        <td>{{ $anggota->nama }}</td>
        <td>{{ $anggota->alamat }}</td>
        <td>{{ $anggota->jenis_kelamin }}</td>
        <td>{{ $anggota->telp }}</td>
        <td>{{ $anggota->tahun_terdaftar }}</td>
        <td>{{ $anggota->regency->name }}</td>
        <td>{{ $anggota->sabuk->name }}</td>
        <td>{{ $anggota->dojeng->name }}</td>
        <td><img src="{{ asset('storage/images/anggota/'.$anggota->photo) }}" alt="" style="width: 100px; height: 100px;"></td>
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
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

</script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // $("#kab").click(function() {
  //   alert("Handler for .change() called.");
  //   console.log('sdfsfs');
  // });

  function myFunction() {
    let id_regency = $('#kab').val();
    //     console.log(id_regency);
    console.log(id_regency);
    $.ajax({
      type: 'POST'
      , url: "{{ route('portal.getAnggota') }}"
      , data: {
        id_regency: id_regency
      }
      , cache: false,

      success: function(msg) {

      }
      // , error: function(data) {
      //   console.log('error: ', data);
      // }
    })
  }

  // $(function() {
  //   $('.kab').on('change', function() {
  //     let id_regency = $('.kab').val();
  //     console.log(id_regency);
  // $(function() {
  //   $('#example').DataTable({
  //     processing: true
  //     , serverSide: true
  //     , responsive: true
  //     , ajax: "{{ route('portal.anggota') }}"
  //     , columns: [{
  //         data: 'DT_RowIndex'
  //         , name: 'DT_RowIndex'
  //       }
  //       , {
  //         data: 'nama'
  //         , name: 'nama'
  //       }
  //       , {
  //         data: 'alamat'
  //         , name: 'alamat'
  //       }
  //       , {
  //         data: 'jenis_kelamin'
  //         , name: 'jenis_kelamin'
  //       }
  //       , {
  //         data: 'telp'
  //         , name: 'telp'
  //       }
  //       , {
  //         data: 'tahun_terdaftar'
  //         , name: 'tahun_terdaftar'
  //       }
  //       , {
  //         data: 'regency.name'
  //         , name: 'regency.name'
  //       }, {
  //         data: 'foto'
  //         , name: 'foto'
  //       }, {
  //         data: 'sabuk.name'
  //         , name: 'sabuk.name'
  //       }, {
  //         data: 'dojeng.name'
  //         , name: 'dojeng.name'
  //       }, {
  //         data: 'action'
  //         , name: 'action'
  //       }
  //     ]
  //   })
  // })
  //   })
  // });

</script>
@endpush
