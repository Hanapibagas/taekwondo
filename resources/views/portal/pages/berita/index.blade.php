@extends('portal.layouts.master')

@section('title', 'Berita')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Berita</h2>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li>Berita</li>
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

<section class="blog-area ">
  <div class="container">
    <div class="row">
      @forelse($berita as $data)
      <div class="col-lg-4 col-md-6">
        <div class="single-blog-post">
          <div class="entry-thumbnail">
            <a href="#"><img src="{{ asset('storage') }}/images/berita/{{ $data->image }}" alt="image" style="height: 200px; width: 300px;"></a>
          </div>
          <div class="entry-post-content">
            <div class="entry-meta">
              <ul>
                <li><a href="#">Admin</a></li>
                <li>{{ $data->tgl }}</li>
              </ul>
            </div>
            <h3><a href="{{ url('berita/detail/'.$data->id) }}">{{ $data->title }}</a></h3>
            {{-- <p>{!! $data->desc !!}</p> --}}
            <a href="{{ url('berita/detail/'.$data->id) }}" class="read-more-btn">Read More <i class="flaticon-add-1"></i></a>
          </div>
        </div>
      </div>
      @empty
      <h3>tidak ada berita</h3>
      @endforelse
      {{-- <div class="col-lg-12 col-md-12">
        <div class="pagination-area">
          <a href="#" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
          <a href="#" class="page-numbers">1</a>
          <span class="page-numbers current" aria-current="page">2</span>
          <a href="#" class="page-numbers">3</a>
          <a href="#" class="page-numbers">4</a>
          <a href="#" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
        </div>
      </div> --}}
    </div>
  </div>
  <div class="shape13"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
  <div class="shape14"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
</section>
@endsection
