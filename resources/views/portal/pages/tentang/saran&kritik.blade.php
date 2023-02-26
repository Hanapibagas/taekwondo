@extends('portal.layouts.master')

@section('title', 'Saran/Kritik')

@section('content')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Saran Dan Kritik</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li>Tentang</li>
                <li>Saran dan Kritik</li>
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
{{-- <section class="contact"> --}}
    <div class="container" style="width: 100%; margin-left">
        <div class="panel panel-default" style="border-color: #99b8c4;">
            <div class="panel-body">
                <form id="form_post" action="{{ route('kirim_saran') }}" method="POST">
                    @csrf
                    <div id="message"></div>

                    <div class="col-md-12 col-sm-12" style="margin-top: 10px">
                        <div class="panel panel-default" style="border-color: #99b8c4;">
                            <div class="panel-heading" style="background-color: transparent; line-height: 1em; ">
                            </div>
                            <div class="panel-body" style="padding-left: 0;padding-right: 0;">
                                <div class="form-group col-md-12 col-sm-12">
                                    <textarea name="saran" type="text" rows="4" class="form-control input-sm"
                                        id="masalah_dilaporkan" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6" style="margin-top: 10px">
                        <div class="col-md-12 col-sm-12" style="margin-bottom:20px">
                            <button style="margin-left:" type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--
</section> --}}
@endsection

@push('script')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('saran');
</script>
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
@endpush