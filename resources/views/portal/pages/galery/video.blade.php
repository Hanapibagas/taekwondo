@extends('portal.layouts.master')

@section('title', 'Video')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Video</h2>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li>Galery</li>
        <li>Video</li>
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


<section class="projects-area style-kalfin mb-5">
  <div class="container">
    <div class="row">
      @foreach ($data as $video)
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="single-projects-box">
          <div class="projects-content">
            <a href="#">
              <iframe src="https://www.youtube.com/embed/{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;">
              </iframe>
            </a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <div class="shape13"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
    <div class="shape15"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
  </div>
</section>
@endsection
