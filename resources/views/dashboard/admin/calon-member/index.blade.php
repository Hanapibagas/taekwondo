@extends('dashboard.layouts.master')

@section('title', 'Program Kerja')

@push('style')

@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Calon Murid</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Calon Murid</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-data" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Umur</th>
                                <th>Nama Orang Tua</th>
                                <th>Pendidikan</th>
                                <th>Umum</th>
                                <th>Agama</th>
                                <th>No.Hp</th>
                                <th>Status Pendaftaran</th>
                                <th>Geup</th>
                                <th>Kabupaten/Kota</th>
                                <th>Kacamatan</th>
                                <th>Dojang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $CalonMurid as $key => $data )
                            <tr>
                                <th>{{ $data->nama_lengkap }}</th>
                                <th>{{ $data->tempat_lahir }}</th>
                                <th>{{ $data->tanggal_lahir }}</th>
                                <th>{{ $data->alamat }}</th>
                                <th>{{ $data->umur }}</th>
                                <th>{{ $data->nama_orang_tua }}</th>
                                <th>{{ $data->pendidikan }}</th>
                                <th>{{ $data->umum }}</th>
                                <th>{{ $data->agama }}</th>
                                <th>{{ $data->no_hp }}</th>
                                <th>{{ $data->status_pendaftaran }}</th>
                                <th>{{ $data->geup }}</th>
                                <th>{{ $data->kabupaten->name ?? ""}}</th>
                                <th>{{ $data->Kacamatan->name ?? ""}}</th>
                                <th>{{ $data->Dojang->name }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@include('dashboard.admin.tentang.program_kerja.modal')

@endsection

@push('script')

@endpush