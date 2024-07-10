@extends('Admin.Layouts.master')

@section('title', 'Master Demisioners')

@section('content-header')
<h1>Master Demisioners</h1>
@php
$hasAddFeature = false;
$hasEditFeature = false;
$hasDeleteFeature = false;
if (count($features->features) > 0) {
foreach ($features->features as $feature) {
if ($feature['featslug'] == 'add') {
foreach ($feature->permissions as $permission) {
if ($permission->permisfeatid == $feature->id) {
$hasAddFeature = $permission->hasaccess;
break;
}
}
}
}

foreach ($features->features as $feature) {
if ($feature['featslug'] == 'edit') {
foreach ($feature->permissions as $permission) {
if ($permission->permisfeatid == $feature->id) {
$hasEditFeature = $permission->hasaccess;
break;
}
}
}
}

foreach ($features->features as $feature) {
if ($feature['featslug'] == 'delete') {
foreach ($feature->permissions as $permission) {
if ($permission->permisfeatid == $feature->id) {
$hasDeleteFeature = $permission->hasaccess;
break;
}
}
}
}
}
@endphp
@endsection

@section('content-body')
@includeIf('Admin.Pages.Masters.Demisioners.datatable')
@endsection

@section('content-modal')
@includeIf('Admin.Pages.Masters.Demisioners.form')
@endsection

@push('script')
<script type="text/javascript">
    var table
    $(function () {
        $('#datatable-search').keyup(function(){
            $('#datatable').DataTable().search($(this).val()).draw();
        })
        
      table = $('#datatable').DataTable({
          "bFilter": true,
          processing: true,
          serverSide: true,
          ajax: "{{ url()->current() }}",
          "drawCallback": function () {
                $('.dataTables_paginate > .paginate_button').addClass('page-link p-2');
            },
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'nama', name: 'nama'},
              {data: 'genders', name: 'genders'},
              {data: 'periode', name: 'periode'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
      });

      $('.dataTables_filter').addClass('d-none')
    });

    $(document).ready(function () {
    $(document).on('submit', '#modal-form form', function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('#modal-form').modal('hide');
            setSuccess(response?.message ?? 'Berhasil!')
            table.ajax.reload();
        },
        error: function(xhr) {
            let message = 'Tidak dapat menyimpan data';
            if (xhr.status === 400 || xhr.status === 403) {
                let responseJSON = xhr.responseJSON || {};
                if (responseJSON.message) {
                    message = responseJSON.message;
                }
            }
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: message
            });
        }
    });
});

// Menghapus input
$(document).on('click', '.add-jbt-row', function() {
    let newInput = `
        <div class="input-group mb-3">
            <select name="jabatan[]" class="form-control" required>
                <option value="">Pilih Jabatan</option>
                @foreach ($roles as $key => $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <input type="number" min="2000" name="tahun[]" class="form-control" placeholder="Tahun..." required>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-jbt-row"><i class="fa fa-minus"></i></button>
            </div>
        </div>`;
    $('#jabatan-container').append(newInput);
});

// Menghapus input
$(document).on('click', '.remove-jbt-row', function() {
    $(this).closest('.input-group').remove();
});

// Menghapus input
$(document).on('click', '.add-pres-row', function() {
    let newInput = `
                    <div class="prestasi-item">
                        <div class="input-group mb-3">
                            <input type="text" name="title[]" class="form-control" placeholder="Judul Prestasi..." required>
                            <input type="number" min="2000" name="thn[]" class="form-control" placeholder="Tahun..." required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-pres-row"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <textarea name="desc[]" class="form-control mb-3" placeholder="Description..." cols="30" rows="3"></textarea>
                    </div>`;
    $('#prestasi-container').append(newInput);
});

// Menghapus input
$(document).on('click', '.remove-pres-row', function() {
    $(this).closest('.input-group').remove();
});
});

    function addForm(url) {
      const hasAddFeature = {{ isset($hasAddFeature) ? json_encode($hasAddFeature) : 'null' }};
      const letItGo = !hasAddFeature;
        if (letItGo) {
          Swal.fire({
            title: 'Tidak Memiliki Akses',
            text: "Anda tidak memiliki akses untuk menambahkan data",
            icon: 'error',
          })
          return
        }
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Demisioner');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=name]').focus();

        $('#jabatan-container').html(`
                            <div class="input-group mb-3">
                                <select name="jabatan[]" class="form-control" required>
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($roles as $key => $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" min="2000" name="tahun[]" class="form-control" placeholder="Tahun..." required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success add-row"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
        `);

        $('#photo-container').html(`
                                    <div class="input-group mb-3">
                                        <input type="file" name="photo[]" id="photo" class="form-control" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success add-photo-row"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
        `);
$('#prestasi-container').html(`
                    <div class="prestasi-item">
                        <div class="input-group mb-3">
                            <input type="text" name="title[]" class="form-control" placeholder="Judul Prestasi..." required>
                            <input type="number" min="2000" name="thn[]" class="form-control" placeholder="Tahun..." required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-prestasi-row"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <textarea name="desc[]" class="form-control mb-3" placeholder="Description..." cols="30" rows="3"></textarea>
                    </div>
`);

// Menambah input baru
$('.add-photo-row').on('click', function() {
    let newInput = `
                            <div class="input-group mb-3">
                                <input type="file" name="photo[]" id="photo" class="form-control" required>
                                <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-photo-row"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
        `;
    $('#photo-container').append(newInput);
});

// Menghapus input
$(document).on('click', '.remove-photo-row', function() {
    $(this).closest('.input-group').remove();
});

// Menambah input baru
$('.add-row').on('click', function() {
    let newInput = `
        <div class="input-group mb-3">
            <select name="jabatan[]" class="form-control" required>
                <option value="">Pilih Jabatan</option>
                @foreach ($roles as $key => $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <input type="number" min="2000" name="tahun[]" class="form-control" placeholder="Tahun..." required>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-row"><i class="fa fa-minus"></i></button>
            </div>
        </div>`;
    $('#jabatan-container').append(newInput);
});

// Menghapus input
$(document).on('click', '.remove-row', function() {
    $(this).closest('.input-group').remove();
});

// Menambah input baru
$('#prestasi-container').on('click', '.add-prestasi-row', function() {
    let newInput = `
        <div class="prestasi-item">
            <div class="input-group mb-3">
                <input type="text" name="title[]" class="form-control" placeholder="Judul Prestasi..." required>
                <input type="number" min="2000" name="thn[]" class="form-control" placeholder="Tahun..." required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-prestasi-row"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <textarea name="desc[]" class="form-control mb-3" placeholder="Description..." cols="30" rows="3"></textarea>
        </div>`;
    $('#prestasi-container').append(newInput);
});

// Menghapus input
$('#prestasi-container').on('click', '.remove-prestasi-row', function() {
    $(this).closest('.prestasi-item').remove();
});
    }

    function editForm(url) {  
      const hasEditFeature = {{ isset($hasEditFeature) ? json_encode($hasEditFeature) : 'null' }};
      const letItGo = !hasEditFeature;
        if (letItGo) {
          Swal.fire({
            title: 'Tidak Memiliki Akses',
            text: "Anda tidak memiliki akses untuk mengubah data",
            icon: 'error',
          })
          return
        }
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Demisioner');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=name]').focus();

        $('#jabatan-container').html(``);
        $('#prestasi-container').html(``);
        $('#photo-container').html(``);
        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama]').val(response?.data?.nama ?? '');
                $('#modal-form [name=periode]').val(response?.data?.periode ?? '');
                $('#modal-form [name=gender]').val(response?.data?.jk?.id ?? '');

                response?.data?.jabatan.forEach((element, index) => {
                    let newRow;
                    let options = '';
                    @foreach ($roles as $key => $role)
                        options += `<option value="{{ $role->id }}">{{ $role->name }}</option>`;
                    @endforeach

                    if (index == 0) {
                        newRow = `
                            <div class="input-group mb-3">
                                <select name="jabatan[]" class="form-control" required>
                                    <option value="${element.id}">${element.jabatan.name}</option>
                                    ${options}
                                </select>
                                <input type="number" value="${element.tahun}" min="2000" name="tahun[]" class="form-control" placeholder="Tahun..." required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success add-jbt-row"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>`;
                    } else {
                        newRow = `
                            <div class="input-group mb-3">
                                <select name="jabatan[]" class="form-control" required>
                                    <option value="${element.id}">${element.jabatan.name}</option>
                                    ${options}
                                </select>
                                <input type="number" value="${element.tahun}" min="2000" name="tahun[]" class="form-control" placeholder="Tahun..." required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-jbt-row"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>`;
                    }
                    $('#jabatan-container').append(newRow);
                });

                response?.data?.prestasi.forEach((element, index)=>{
                    let newRow;
                    if (index == 0) {
                        newRow = `
                        <div class="prestasi-item">
                            <div class="input-group mb-3">
                                <input type="text" value="${element.title}" name="title[]" class="form-control" placeholder="Judul Prestasi..." required>
                                <input type="number" value="${element.tahun}" min="2000" name="thn[]" class="form-control" placeholder="Tahun..." required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success add-pres-row"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <textarea name="desc[]" class="form-control mb-3" placeholder="Description..." cols="30" rows="3">${element.desc}</textarea>
                        </div>
                    `;
                    } else {
                        newRow = `
                            <div class="prestasi-item">
                            <div class="input-group mb-3">
                                <input type="text" value="${element.title}" name="title[]" class="form-control" placeholder="Judul Prestasi..." required>
                                <input type="number" value="${element.tahun}" min="2000" name="thn[]" class="form-control" placeholder="Tahun..." required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-pres-row"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <textarea name="desc[]" class="form-control mb-3" placeholder="Description..." cols="30" rows="3">${element.desc}</textarea>
                        </div>
                        `;
                    }
                    $('#prestasi-container').append(newRow);
                })

                response?.data?.photo.forEach((element, index)=>{
                    let newRow;
                    if (index == 0) {
                        newRow = `
                            <div class="input-group mb-3">
                                <img src="${element.url}" class="img-fluid">
                                <input value="${element.url}" type="file" name="photo[]" id="photo" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success add-pho-row"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                    `;
                    } else {
                        newRow = `
                            <div class="input-group mb-3">
                                <img src="${element.url}" class="img-fluid">
                                <input value="${element.url}" type="file" name="photo[]" id="photo" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success remove-pho-row"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        `;
                    }
                    $('#photo-container').append(newRow);
                })
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
      const hasDeleteFeature = {{ isset($hasDeleteFeature) ? json_encode($hasDeleteFeature) : 'null' }};
      const letItGo = !hasDeleteFeature;
        if (letItGo) {
          Swal.fire({
            title: 'Tidak Memiliki Akses',
            text: "Anda tidak memiliki akses untuk menghapus data",
            icon: 'error',
          })
          return
        }
      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(url, {
                          '_token': $('[name=csrf-token]').attr('content'),
                          '_method': 'delete'
                      })
                      .done((response) => {
                          setSuccess(response?.message + '\n' +'Akun '+response.data.name +' terhapus.')
                          table.ajax.reload();
                      })
                      .fail((errors) => {
                          alert('Tidak dapat menghapus data');
                          return;
                      });
        }
      })
    }
</script>
@endpush