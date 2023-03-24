@extends('portal.layouts.master')

@section('title', 'Data Dojang')

@push('style')
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
@endpush

@section('content')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Pendaftaran Dojang</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li>Pendaftaran Dojang</li>
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

<div class="container">
    <div class="r-bg-x pb120">
        <div class="container w-992">
            <div class="blog-details">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sol-img mt60"></div>
                        <div class="ree-blog-details">
                            <form action="{{ route('dojeng.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                 <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nama">Nama Pelatih Utama <i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="pelatih" @error('pelatih') is-invalid
                                        @enderror" name="pelatih" autocomplete="off" autofocus>
                                    @if($errors->has('pelatih'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('pelatih')
                                        }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat Dojang <i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="alamat" @error('alamat') is-invalid
                                        @enderror" name="alamat" autocomplete="off" autofocus>
                                    @if($errors->has('alamat'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Kabupaten/Kota<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <select name="kabupaten" class="form-control" id="kabupaten">
                                        <option value="">Silahkan isi</option>
                                        @foreach ($kabupaten as $item )
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Kacamatan<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <select name="kacamatan" class="form-control" id="kacamatan">
                                        <option value="">Silahkan pilih</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Dojeng <i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="name" @error('name') is-invalid
                                        @enderror" name="name" autocomplete="off" autofocus>
                                    @if($errors->has('name'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">No. Hp/Wa<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="kontak" @error('kontak') is-invalid
                                        @enderror" name="kontak" autocomplete="off" autofocus>
                                    @if($errors->has('kontak'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('kontak') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Deskripsi <i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <textarea name="deskripsi" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Foto <i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <input type="file" class="form-control" name="foto" @error('foto') is-invalid
                                        @enderror" name="foto" autocomplete="off" autofocus>
                                    @if($errors->has('foto'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('foto') }}</span>
                                    @endif
                                </div>
                                <button style="margin-top: 40px;margin-bottom: 20px; margin-left: 80%" type="submit"
                                    class="btn btn-success"> Kirim </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });

        $(function() {
            $('#kabupaten').on('change', function() {
                let id_kacamatan = $('#kabupaten').val();
console.log(id_kacamatan);
                $.ajax({
                    type: 'get',
                    url: '{{ route('getkacamatan') }}',
                    data: {
                        id_kacamatan: id_kacamatan
                    },
                    cache: false,

                    success: function(msg) {
                        $('#kacamatan').html(msg);
                        // $('#kecamatan').html('');
                        // $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            })
        });
</script>
@endpush