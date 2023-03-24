@extends('portal.layouts.master')

@section('title', 'Dojang')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2> Detail Dojang</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Detail Dojang</li>
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

<section class="projects-details-area mb-2 ">
    <div class="container mt-5">
      {{-- <img src="{{ asset('storage/images/struktur-kepengurusan/' . $ojeng->image) }}" alt="image"> --}}
      <style>
              .team-1 {
                  margin-bottom: 30px;
                  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
              }
  
              .team-1 .team-img {
                  overflow: hidden;
              }
  
              .team-1 .team-img img {
                  width: 50%;
                  height: auto;
                  transition: all .3s;
              }
  
              .team-1:hover .team-img img {
                  transform: scale(1.2);
              }
  
              .team-1 .team-content {
                  padding: 20px;
              }
  
              .team-1 .team-content h2 {
                  font-size: 25px;
                  font-weight: 400;
                  letter-spacing: 2px;
              }
  
              .team-1 .team-content h3 {
                  font-size: 16px;
                  font-weight: 300;
              }
  
              .team-1 .team-content h4 {
                  font-size: 16px;
                  font-weight: 300;
                  font-style: italic;
                  letter-spacing: 1px;
                  margin-bottom: 25px;
              }
  
              .team-1 .team-content p {
                  font-size: 16px;
                  font-weight: 400;
                  line-height: 22px;
              }
  
              .team-1 .team-social {
                  display: flex;
                  align-items: center;
                  justify-content: flex-start;
                  font-size: 0;
              }
  
              .team-1 .team-social a {
                  display: inline-block;
                  width: 40px;
                  height: 40px;
                  margin-right: 5px;
                  padding: 11px 0 10px 0;
                  font-size: 16px;
                  line-height: 16px;
                  text-align: center;
                  color: #ffffff;
                  transition: all .3s;
              }
  
              .team-1 .team-social a.social-tw {
                  background: #00acee;
              }
  
              .team-1 .team-social a.social-fb {
                  background: #3b5998;
              }
  
              .team-1 .team-social a.social-li {
                  background: #0e76a8;
              }
  
              .team-1 .team-social a.social-in {
                  background: #3f729b;
              }
  
              .team-1 .team-social a.social-yt {
                  background: #c4302b;
              }
  
              .team-1 .team-social a:last-child {
                  margin-right: 0;
              }
  
              .team-1 .team-social a:hover {
                  background: #222222;
              }
  
              .row-team {
                  display: -ms-flexbox;
                  display: flex;
                  -ms-flex-wrap: wrap;
                  flex-wrap: wrap;
                  margin-right: -15px;
                  margin-left: -15px;
              }
  
              .column-team {
                  position: relative;
                  width: 100%;
                  padding-right: 15px;
                  padding-left: 15px;
                  -ms-flex: 0 0 100%;
                  flex: 0 0 100%;
                  max-width: 100%;
              }
  
              @media (min-width: 576px) {
                  .column-team {
                      -ms-flex: 0 0 50%;
                      flex: 0 0 50%;
                      max-width: 50%;
                  }
              }
  
              @media (min-width: 768px) {
                  .column-team {
                      -ms-flex: 0 0 33.333333%;
                      flex: 0 0 33.333333%;
                      max-width: 33.333333%;
                  }
              }
  
              @media (min-width: 992px) {
                  .column-team {
                      -ms-flex: 0 0 25%;
                      flex: 0 0 25%;
                      max-width: 25%;
                  }
              }
          </style>
          <div class="container" id="c-level">
              <div class="row-team">
                  <div class="column-team ">
                    <div class="team-1">
                        <div class="team-img">
                            @if ($dojang->foto)
                            <img class="mx-auto d-flex" src="{{ asset('storage/images/dojang/' . $dojang->foto) }}" alt="image">
                            @else
                             <img class="mx-auto d-flex" src="{{ asset('storage/images/dojang/dojang.jpg') }}" alt="image">
                            @endif
                            
                            
                        </div>
                        <div class="team-content">
                            <h2>{{ $dojang->name }}</h2>
                            <p>{{ $dojang->pelatih }}</p>
                            <p>{{ $dojang->kontak }}</p>
                            <p>{{ $dojang->alamat }}</p>
                            <p>{{ $dojang->Kecamatan->name ?? "" }}</p>
                            <p>{{ $dojang->Kabupaten->name ?? "" }}</p>
                            <p>{{ $dojang->deskripsi  }}</p>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
    </div>
  </section>
@endsection
