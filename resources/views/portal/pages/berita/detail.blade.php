@extends('portal.layouts.master')

@section('title', '')

@push('style')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61fdcb3c97a9c5001998eb2d&product=inline-share-buttons' async='async'></script>
@endpush

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>{{ $detail->title }}</h2>
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


<section class="blog-details-area ptb-110">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="blog-details">
          <div class="article-image">
            <img src="{{ asset('storage') }}/images/berita/{{ $detail->image }}" alt="image">
          </div>
          <div class="article-content">
            <div class="entry-meta">
              <ul>
                <li><i class="far fa-user-circle"></i> By: <a href="#">Admin</a></li>
                <li><i class="far fa-calendar-alt"></i> {{ $detail->tgl }}</li>
                <li><i class="fas fa-tags"></i> <a href="#">Tech</a></li>
                <li><i class="far fa-clock"></i> 2 Mins Read</li>
                <li><i class="fas fa-eye"></i> 521 Views</li>
                <li><i class="far fa-comment-dots"></i> <a href="#">3 Comments</a></li>
              </ul>
            </div>

            <p>{!! $detail->desc !!}</p>

          </div>
         
          <div class="article-footer">
           
            <!-- ShareThis BEGIN -->
            <div class="sharethis-inline-share-buttons"></div>
            <!-- ShareThis END -->
           
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <aside class="widget-area" id="secondary">
          <section class="widget widget_evolta_posts_thumb">
            <h3 class="widget-title">Popular Posts</h3>
            @forelse($berita as $b)
            <article class="item">
              <a href="#" class="thumb">
                <span class="fullimage cover" role="img">
                  <img src="{{ asset('storage') }}/images/berita/{{ $b->image }}" alt="">
                </span>
              </a>
              <div class="info">
                <time datetime="2021-06-30">{{ $b->tgl }}</time>
                <h4 class="title usmall"><a href="{{ url('berita/detail/'.$b->id) }}">{{ $b->title }}</a></h4>
              </div>
              <div class="clear"></div>
            </article>
            @empty

            @endforelse

          </section>
        </aside>
      </div>
    </div>
  </div>
</section>
@endsection
