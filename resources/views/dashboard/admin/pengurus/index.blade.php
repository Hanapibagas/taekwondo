@extends('dashboard.layouts.master')

@section('title', 'Master Pengurus')

@push('style')

@endpush

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Master Pengurus</h3>
        <p class="text-subtitle text-muted">For user to check they list</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Master Pengurus</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-success mb-4" data-toggle="modal" id="button-tambah"><i class="mdi mdi-plus-circle"></i> Tambah
        </button>
        <div class="table-responsive">
          <table class="table table-bordered" id="table-data" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Telp</th>
                <th>Sabuk</th>
                <th>Dojeng</th>
                <th>Kab/Kota</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

@include('dashboard.admin.pengurus.modal')

@endsection

@push('script')

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(function() {
    $('#table-data').DataTable({
      processing: true
      , serverSide: true
      , responsive: true
      , ajax: "{{ route('pengurus.index') }}"
      , columns: [{
          data: 'DT_RowIndex'
          , name: 'DT_RowIndex'
        }, {
          data: 'foto'
          , name: 'foto'
        }, {
          data: 'anggota.nama'
          , name: 'anggota.nama'
        }, {
          data: 'jabatan.name'
          , name: 'jabatan.name'
        }, {
          data: 'anggota.alamat'
          , name: 'anggota.alamat'
        }, {
          data: 'anggota.jenis_kelamin'
          , name: 'anggota.jenis_kelamin'
        }, {
          data: 'anggota.telp'
          , name: 'anggota.telp'
        }, {
          data: 'anggota.sabuk.name'
          , name: 'anggota.sabuk.name'
        }, {
          data: 'anggota.dojeng.name'
          , name: 'anggota.dojeng.name'
        }, {
          data: 'anggota.regency.name'
          , name: 'anggota.regency.name'
        }, {
          data: 'action'
          , name: 'action'
        }

      ]
    });
  });


  //ketika tombol add  di tekan
  $('#button-tambah').click(function() {
    $('#button-simpan').html('Simpan'); //valuenya menjadi create-post
    $('#id').val(''); //valuenya menjadi kosong
    $('#result').html('') //valuenya menjadi kosong
    $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
    $('#title').html("Tambah Program Kerja"); //valuenya tambah role baru
    $('#tambah-edit-modal').modal('show'); //modal tampil
  });

  //ketika tombol simpan di tekan
  $('#form-tambah-edit').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    var form = $('form');
    form.find('span').remove();
    form.find('.form-group').removeClass('is-invalid');
    form.find('.form-control').removeClass('is-invalid');

    $.ajax({
      type: "POST"
      , url: "{{ route('pengurus.store') }}"
      , data: formData
      , processData: false
      , contentType: false
      , success: function(data) {
        $('#form-tambah-edit').trigger("reset");
        $('#tambah-edit-modal').modal('hide');
        $('#table-data').DataTable().ajax.reload();
        Swal.fire({
          type: 'success'
          , title: 'Sukses!'
          , text: 'Data berhasil disimpan!'
        });
      }
      , error: function(xhr) {
        var res = $.parseJSON(xhr.responseText);
        if ($.isEmptyObject(res) == false) {
          $.each(res.errors, function(key, value) {

            $('#' + key).closest('.form-group').addClass('is-invalid').append(
              '<span class="is-invalid text-danger">' + value +
              '</span>');
            $('#' + key).closest('.form-control').addClass('is-invalid');
          })
        }
      }
    });
  });
  //akhir tombol simpan

  //ketika tombol edit di tekan
  $('body').on('click', '.edit-data', function() {
    let data_id = $(this).data('id');

    $.get('edit-pengurus/' + data_id, function(data) {
      $('#tambah-edit-modal').modal('show');
      $('#title').html("Edit Program Kerja "); //valuenya tambah role baru
      $('#button-simpan').html('Update');
      $('#id').val(data.id);
      $('#regency').val(data.regency);
      $('#anggota').val(data.anggota);
      $('#jabatan').val(data.jabatan);
      $('#result').html('kosongkan jika tidak ingin mengubah lampiran');
    })

  })

  //ketika tombol delete di tekan
  $('body').on('click', '.delete-data', function() {
    let dataId = $(this).attr('id');
    Swal.fire({
      icon: 'warning'
      , title: 'Hapus? '
      , text: 'Anda yakin ingin menghapus data ini?'
      , type: 'warning'
      , showCancelButton: true
      , confirmButtonColor: '#d33'
      , confirmButtonText: 'Hapus'
      , cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          method: "get"
          , url: "delete-pengurus/" + dataId,

          success: function(data) {
            $('#table-data').DataTable().ajax.reload();
            Swal.fire({
              type: 'success'
              , title: 'Sukses!'
              , text: 'Data berhasil dihapus!'
            });
          }
          , error: function(data) {
            Swal.fire({
              type: 'error'
              , title: 'Oops....'
              , text: 'Something went wrong'
            })
          }
        });
      }
    })
  });

  $(function() {
    $('#regency').on('change', function() {
      let id_regency = $('#regency').val();
      console.log(id_regency);
      $.ajax({
        type: 'POST'
        , url: "{{ route('pengurus.getAnggota') }}"
        , data: {
          id_regency: id_regency
        }
        , cache: false,

        success: function(msg) {
          $('#anggota').html(msg);
        }
        , error: function(data) {
          console.log('error: ', data);
        }
      , })
    })
  })

</script>

@endpush