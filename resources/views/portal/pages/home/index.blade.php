@extends('portal.layouts.master')

@section('title', 'Home')

@section('content')

<!-- Banner Start -->
<section class="main-banner slider-mobile" id="main-banner">
  <div class="container-fluid">
    @include('portal.pages.home._banner')
  </div>
</section>
<!-- Banner End -->

<!-- Sambutan Ketua -->
<section class="about-area mt-5">
  <div class="container">
    @include('portal.pages.home._sambutan')
  </div>
</section>
<!-- Sambutan ketua End -->

<!-- Kegiatan -->
<section class="projects-area ptb-110">
  <div class="container">
    @include('portal.pages.home._berita')
  </div>
</section>
<!-- Kegiatan End -->

<!-- Sponsor -->
<div class="partner-area bg-f2feee">
  <div class="container">
    @include('portal.pages.home._sponsor')
  </div>
</div>
<!-- Sponsor End -->
@endsection
