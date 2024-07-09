@extends('Admin.Layouts.master')

@section('title', 'Setting File')

@section('content-header')
      <h1>Setting File</h1>
    @php
    $hasViewImgFeature = false;
    $hasDeleteFeature = false;
    if (count($features->features) > 0) {
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

        foreach ($features->features as $feature) {
            if ($feature['featslug'] == 'viewimg') {
              foreach ($feature->permissions as $permission) {
                if ($permission->permisfeatid == $feature->id) {
                  $hasViewImgFeature = $permission->hasaccess;
                  break;
                }
              }
            }
        }
    }
    @endphp
@endsection

@section('content-body')
  @includeIf('Admin.Pages.Settings.Files.datatable')
@endsection

@section('content-modal')
  @includeIf('Admin.Pages.Settings.Files.form')
@endsection

@push('script')
  <script type="text/javascript">

  function toggleMode(mode) { 
      if (mode == 'children') {
      $('#mode').val('{{Crypt::encryptString('children')}}');
      } else {
        $('#mode').val('{{Crypt::encryptString('parent')}}');
      }
      $('#form-btn-toggle').submit();
     }

    var table
    $(function () {
        $('#datatable-search').keyup(function(){
            $('#datatable').DataTable().search($(this).val()).draw();
        })

            table = $('#datatable').DataTable({
                "bFilter": true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url()->current() }}",
                },
                "drawCallback": function () {
                      $('.dataTables_paginate > .paginate_button').addClass('page-link p-2');
                  },
                columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'filename', name: 'filename'},
              {data: 'type', name: 'type'},
              {data: 'mimetype', name: 'mimetype'},
              {data: 'filesize', name: 'filesize'},
              {data: 'action', name: 'action'},
            ]
            });
      $('.dataTables_filter').addClass('d-none')
    });

    function viewImg(url) {
      const hasViewImgFeature = {{ isset($hasViewImgFeature) ? json_encode($hasViewImgFeature) : 'null' }};
      const letItGo = !hasViewImgFeature;
        if (letItGo) {
          Swal.fire({
            title: 'Tidak Memiliki Akses',
            text: "Anda tidak memiliki akses untuk melihat gambar",
            icon: 'error',
          })
          return
        }
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('');
        $('#img-viewer').attr('src', url);
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