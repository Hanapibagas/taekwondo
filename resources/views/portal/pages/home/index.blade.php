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
<section class="projects-area ">
    <div class="container">
        @include('portal.pages.home._berita')
    </div>
</section>
<!-- Kegiatan End -->

<!-- Iklan -->
<div class="">
    <div class="container">
        @include('portal.pages.home._iklan')
    </div>
</div>
<!-- Iklan End -->

{{-- pengumuman --}}
<div class="">
    <div class="container">
        @include('portal.pages.home._pengumuman')
    </div>
</div>
{{-- end pengumuman --}}

<div class="">
    <div class="container">
        @include('portal.pages.home._agenda')
    </div>
</div>

<div class="">
    <div class="container">
        @include('portal.pages.home._gallery')
    </div>
</div>

<!-- Sponsor -->
<div class="">
    <div class="container mt-5">
        @include('portal.pages.home._sponsor')
    </div>
</div>
<!-- Sponso
r End -->
@endsection