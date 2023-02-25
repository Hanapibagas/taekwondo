@extends('portal.layouts.master')

@section('title', 'Daftar Profil Pengurus Kab/Kota')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Profil Pengurus Kab/Kota</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Tentang</li>
        <li>Daftar Profil Pengurus Kab/Kota</li>
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
<section class="projects-details-area ptb-110">
  <div class="container">
    <div class="projects-details">
      {{-- <div class="">
        <div class="single-image">
          <img src="{{ asset('portal')}}/assets/img/projects/1.jpg" alt="image">
    </div>
  </div> --}}
  <div class="projects-details-desc">
    <h2>PROFIL PENGURUS {{ $kab->name }}</h2>
    <p class="mb-3">DAFTAR PENGURUS {{ $kab->name }}</p>
    <div class="row">
      <div class="col">
        <table class="table table-striped">
          {{-- @foreach($data as $pengurus) --}}
          @forelse($data as $pengurus)
          <tr>
            <td style="width: 300px">{{ $pengurus->jabatan->name }}</td>
            <td style="width: 20px">:</td>
            <td>
              {{-- @foreach($pengurus->anggota as $p) --}}
              <div style="">{{ $pengurus->anggota->nama }}</div>
              {{-- <ul>
                <li>{{ $p->nama }}</li>
              </ul> --}}
              {{-- @endforeach --}}
            </td>
          </tr>
          {{-- @endforeach --}}
          @empty
          <h5>Data tidak ada!</h5>
          @endforelse

          {{-- <tr>
            <td>Ketua Umum</td>
            <td>: Kalfin Allotodang</td>
          </tr>
          <tr>
            <td>Sekertaris</td>
            <td>: -</td>
          </tr>
          <tr>
            <td>Bendahara</td>
            <td>: -</td>
          </tr>
          <tr>
            <td>Bidang I</td>
            <td>: -</td>
          </tr>
          <tr>
            <td>Bidang II</td>
            <td>: -</td>
          </tr>
          <tr>
            <td>Bidang III</td>
            <td>: -</td>
          </tr> --}}
        </table>
      </div>
    </div>


    {{-- <img src="{{ asset('storage/files/struktur_kepengurusan/' . $data->image) }}" alt="image"> --}}
  </div>
  </div>
  </div>
</section>
@endsection
