@extends('portal.layouts.master')

@section('title', 'Dojang')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Dojang</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Dojang</li>
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
      {{-- <img src="{{ asset('storage/images/struktur-kepengurusan/' . $data->image) }}" alt="image"> --}}
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
              <form action="{{route('portal.dojang')}}" method="get">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="filter_name" placeholder="Cari Berdasarkan Nama">
                    <div class="px-2">
                      <button class="btn btn-sm btn-secondary" type="submit">
                        Cari
                      </button>
                    </div>
                </div>
                </form>
                <form action="{{route('portal.dojang')}}" method="get">
                <div class="input-group mb-2">
                    <select  class="form-control " id="kabupaten" name="kabupaten">
                            <option label="">Cari Berdasarkan Kabupaten</option>
                            <option value="7301">KABUPATEN KEPULAUAN SELAYAR</option>
                            <option value="7302">KABUPATEN BULUKUMBA</option>
                            <option value="7303">KABUPATEN BANTAENG</option>
                            <option value="7304">KABUPATEN JENEPONTO</option>
                            <option value="7305">KABUPATEN TAKALAR</option>
                            <option value="7306">KABUPATEN GOWA</option>
                            <option value="7307">KABUPATEN SINJAI</option>
                            <option value="7308">KABUPATEN MAROS</option>
                            <option value="7309">KABUPATEN PANGKAJENE DAN KEPULAUAN</option>
                            <option value="7310">KABUPATEN BARRU</option>
                            <option value="7311">KABUPATEN BONE</option>
                            <option value="7312">KABUPATEN SOPPENG</option>
                            <option value="7313">KABUPATEN WAJO</option>
                            <option value="7314">KABUPATEN SIDENRENG RAPPANG</option>
                            <option value="7315">KABUPATEN PINRANG</option>
                            <option value="7316">KABUPATEN ENREKANG</option>
                            <option value="7317">KABUPATEN LUWU</option>
                            <option value="7318">KABUPATEN TANA TORAJA</option>
                            <option value="7322">KABUPATEN LUWU UTARA</option>
                            <option value="7325">KABUPATEN LUWU TIMUR</option>
                            <option value="7326">KABUPATEN TORAJA UTARA</option>
                            <option value="7371">KOTA MAKASSAR</option>
                            <option value="7372">KOTA PAREPARE</option>
                            <option value="7373">KOTA PALOPO</option>
                    </select>
                    <div class="px-2">
                        <button class="btn btn-sm btn-secondary" type="submit">
                          Cari
                        </button>
                      </div>
                    </div>
                </form>
              
              <div class="row-team">
                  @foreach ( $dojang as $data )
                  <div class="column-team ">
                    <div class="team-1">
                        <div class="team-img">
                            @if ($data->foto)
                            <img class="mx-auto d-flex" src="{{ asset('storage/images/dojang/' . $data->foto) }}" alt="image">
                            @else
                             <img class="mx-auto d-flex" src="{{ asset('storage/images/dojang/dojang.jpg') }}" alt="image">
                            @endif
                            
                            
                        </div>
                        <div class="team-content">
                            <h2>{{ $data->name }}</h2>
                            <a href="{{ url('dojang/'.$data->id) }}" class="read-more-btn">Detail Dojang <i class="flaticon-add-1"></i></a>
                            {{-- <p>{{ $data->pelatih }}</p>
                            <p>{{ $data->kontak }}</p>
                            <p>{{ $data->alamat }}</p> --}}
                        </div>
                    </div>
                  </div>
                  @endforeach
              </div>
          </div>
    </div>
  </section>
@endsection
