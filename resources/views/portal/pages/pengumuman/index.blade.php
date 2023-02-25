@extends('portal.layouts.master')

@section('title', 'Pengumuman')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Pengumuman</h2>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li>Pengumuman</li>
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

<section class="projects-details-area mb-5 style-kalfin">
  <div class="container">
    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th width="2">No</th>
          <th>Materi</th>
          <th>Link Video</th>
          <th>Lampiran</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1;
        @endphp
        @forelse ($data as $materi)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $materi->tentang }}</td>
          <td width="5"><a href="{{ url('pengumuman/download/'.$materi->id) }}" class="btn btn-primary"> Download </a>
          </td>
        </tr>
        @php
        $no++;
        @endphp
        @empty
        <tr>
          <td colspan="3" class="text-center">Tidak ada Data.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@endsection
