@extends('Admin.Layouts.master')

@section('title', 'Master Users')

@section('content-header')
    <h1>Master Users</h1>
@endsection

@section('content-body')
  @includeIf('Admin.Pages.Masters.Users.datatable')
@endsection

@section('content-modal')
  @includeIf('Admin.Pages.Masters.Users.form')
@endsection

@push('script')
  <script type="text/javascript">
    var table
    $(function () {
        $('#datatable-search').keyup(function(){
            $('#datatable').DataTable().search($(this).val()).draw();
        })
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
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
      });

      $('.dataTables_filter').addClass('d-none')
    });

    $(document).ready(function () {
    $(document).on('submit', '#modal-form form', function (e) {
        e.preventDefault();
        console.log('Form method:', $(this).attr('_method'));
        console.log('Form action:', $(this).attr('action'));
        $.post($(this).attr('action'), $(this).serialize())
            .done((response) => {
                console.log('AJAX success', response);
                $('#modal-form').modal('hide');
                setSuccess(response?.message ?? 'Berhasil!')
                table.ajax.reload();
            })
            .fail((xhr) => {
                console.log('AJAX error', xhr);
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
            });
    });
});

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah User');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=name]').focus();

        $('#password, #password_confirmation').attr('required', true);
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit User');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=name]').focus();

        $('#password, #confirm_password').attr('required', false);

        $.get(url)
            .done((response) => {
                $('#modal-form [name=role]').val(response?.data?.role?.id ?? '');
                $('#modal-form [name=name]').val(response?.data?.name ?? '');
                $('#modal-form [name=username]').val(response?.data?.username ?? '');
                $('#modal-form [name=email]').val(response?.data?.email ?? '');
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
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