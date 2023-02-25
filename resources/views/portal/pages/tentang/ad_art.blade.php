@extends('portal.layouts.master')

@section('title', 'Anggaran Dasar & Anggaran Rumah Tangga')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Anggaran Dasar & Anggaran Rumah Tangga</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Tentang</li>
        <li>Anggaran Dasar & Anggaran Rumah Tangga</li>
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

<!--<section class="projects-details-area style-kalfin mb-5">-->
<!--  <div class="container">-->
<!--    <iframe src="{{ asset('storage/lampiran/ad-art/' . $data->file) }}" width="100%" height="100%"></iframe>-->
<!--  </div>-->
<!--</section>-->


<section class="projects-details-area mb-5 style-kalfin">
  <div class="container">
    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>File</th>
          <th>Lampiran</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>AD ART Taekwondo Sulawesi Selatan</td>
          <td width="5" colspan="2">
            <a target="_blank" href="https://docs.google.com/viewerng/viewer?url={{ asset('storage/lampiran/ad-art/'.$data->file) }}" class="btn btn-success"> Lihat </a> |
            <a href="{{ url('tentang/ad-art/download/'.$data->id) }}" class="btn btn-primary"> Download </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

@endsection
