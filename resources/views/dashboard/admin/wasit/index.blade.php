@extends('dashboard.layouts.master')

@section('title', 'Wasit')

@push('style')

@endpush

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Wasit</h3>
        <p class="text-subtitle text-muted">For user to check they list</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wasit</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-primary mb-4" data-toggle="modal" id="button-tambah"><i class="mdi mdi-plus-circle"></i> Tambah
        </button>
        <button class="btn btn-success mb-4" data-toggle="modal" id="button-import"><i class="mdi mdi-plus-circle"></i> Import
        </button>
        <div class="table-responsive">
          <table class="table table-bordered" id="table-data" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status Wasit</th>
                <th>Kelas</th>
                <th>DAN</th>
                <th>PWN</th>
                <th>DWN</th>
                <th>PWD</th>
                <th>DWD</th>
                <th>Foto</th>
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

@include('dashboard.admin.wasit._import')
@include('dashboard.admin.wasit.modal')

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
      , ajax: "{{ route('wasit.index') }}"
      , columns: [{
          data: 'DT_RowIndex'
          , name: 'DT_RowIndex'
        }
        , {
          data: 'nama'
          , name: 'nama'
        }, {
          data: 'status_wasit'
          , name: 'status_wasit'
        }, {
          data: 'kelas'
          , name: 'kelas'
        }, {
          data: 'dan'
          , name: 'dan'
        }, {
          data: 'pwn'
          , name: 'pwn'
        }, {
          data: 'dwn'
          , name: 'dwn'
        }, {
          data: 'pwd'
          , name: 'pwd'
        }, {
          data: 'dwd'
          , name: 'dwd'
        }, {
          data: 'foto'
          , name: 'foto'
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
    $('#title').html("Tambah Data Wasit"); //valuenya tambah role baru
    $('#tambah-edit-modal').modal('show'); //modal tampil
  });

  //ketika tombol add  di tekan
  $('#button-import').click(function() {
    $('#button-import-wasit').html('Upload'); //valuenya menjadi create-post
    $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
    $('#title-import').html("Import Data Wasit"); //valuenya tambah role baru
    $('#import-modal').modal('show'); //modal tampil
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
      , url: "{{ route('wasit.store') }}"
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

    $.get('edit-wasit/' + data_id, function(data) {
      $('#tambah-edit-modal').modal('show');
      $('#title').html("Edit Data Wasit "); //valuenya tambah role baru
      $('#button-simpan').html('Update');
      $('#id').val(data.id);
      $('#nama').val(data.nama);
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
          , url: "delete-wasit/" + dataId,

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

</script>

@endpush
