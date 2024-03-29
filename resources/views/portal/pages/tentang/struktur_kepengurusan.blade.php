@extends('portal.layouts.master')

@section('title', 'Struktur & Kepengurusan')

@section('content')
<div class="page-title-area">
  <div class="container">
    <div class="page-title-content">
      <h2>Struktur dan Kepengurusan</h2>
      <ul>
        <li><a href="/">Home</a></li>
        <li>Tentang</li>
        <li>Struktur dan Kepengurusan</li>
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
<section class="projects-details-area">
  <div class="container">
    <img src="{{ asset('storage/images/struktur-kepengurusan/' . $data->image) }}" alt="image">
    <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Daftar kepengurusan</h1>
            </div>
            <table class="table table-bordered" style="text-align: center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $datas as $item )
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $item->anggota->nama }}</td>
                        <td>{{ $item->jabatan->name }}</td>
                        <td>
                            <img src="{{ asset('storage/images/anggota/' . $item->anggota->photo) }}" alt="" style="width: 100px"
                                class="img-thumbnail">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  </div>
</section>
@endsection
