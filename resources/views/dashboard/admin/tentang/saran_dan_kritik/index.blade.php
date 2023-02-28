@extends('dashboard.layouts.master')

@section('title', 'Program Kerja')

@push('style')

@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Saran Dan Kritik</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Saran & Kritik</li>
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
                                <th>Saran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $datas as $key => $data )
                            <tr>
                                <th>{!! $data->saran !!}</th>
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