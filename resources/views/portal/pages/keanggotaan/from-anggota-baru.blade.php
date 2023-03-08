@extends('portal.layouts.master')

@section('title', 'Data Anggota')

@push('style')
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
@endpush

@section('content')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Pendaftaran Calon Murid</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li>Pendaftaran Calon Murid</li>
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
                            <form action="{{ route('store.calon.murid') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="nama_lengkap" @error('nama')
                                        is-invalid @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat Lahir<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="tempat_lahir" @error('nama')
                                        is-invalid @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="date" class="form-control" name="tanggal_lahir" @error('nama')
                                        is-invalid @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="alamat" @error('nama') is-invalid
                                        @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Orang Tua<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="nama_orang_tua" @error('nama')
                                        is-invalid @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pendidikan<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <select name="pendidikan" @error('pendidikan') is-invalid @enderror
                                        class="form-control">
                                        <option value="Silahkan pilih">Silahkan Pilih</option>
                                        <option value="Pelajar">Pelajar</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Umum">Umum</option>
                                    </select>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Agama<i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <select class="form-control" name="agama" @error('agama') is-invalid @enderror">
                                        <option value="Silahkan pilih">Silahkan Pilih</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">No. HP<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <input type="number" class="form-control" name="no_hp" @error('nama') is-invalid
                                        @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Status Pendaftaran<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <select class="form-control" name="status_pendaftaran" @error('nama') is-invalid
                                        @enderror">
                                        <option value="Silahkan pilih">Silahkan Pilih</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Pindah">Pindah</option>
                                    </select>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Geup<i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="geup" @error('nama') is-invalid
                                        @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Umum<i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control" name="umum" @error('nama') is-invalid
                                        @enderror" name="nama" autocomplete="off" autofocus>
                                    @if($errors->has('nama'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Kabupaten/Kota<i class="text-danger"
                                            style="font-size: 14px;">*</i></label>
                                    <select name="kabupaten_kota" class="form-control" id="kabupaten">
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
                                    <label for="nama">Pilih Dojang</label><br>
                                    <select name="dojang_id" class="form-control">
                                        <option value="">Silahkan isi</option>
                                        @foreach ($dojang as $item )
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button style="margin-top: 90px;margin-bottom: 20px; margin-left: 80%" type="submit"
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