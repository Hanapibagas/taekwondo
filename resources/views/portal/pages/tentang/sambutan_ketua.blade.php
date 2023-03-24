@extends('portal.layouts.master')

@section('title', 'Sambutan Ketua Umum')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Sambutan Ketua Umum</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Tentang</li>
        <li>Sambutan Ketua Umum</li>
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

<section class="about-area ">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-12 col-sm-12 ">
        <div class="about-content">
          <h4><b>{{ $sambutan->nama }}</b></h4>
          <p>{!! $sambutan->body !!}</p>
                <h3 class="mt-4"><b>Kalfin Alloto'dang, S.Kom., MT <b/> </h3>
      <p style="font-size:14px;"> <b> Ketua Umum Taekwondo Sulawesi Selatan </b> </p>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="about-image">
          <!--<img src="{{ asset('storage/images/anggota/' . $sambutan->pengurus->anggota->photo) }}" alt="image">-->
          <img src="{{ asset('portal/ketua.png') }}" alt="image">
          
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
