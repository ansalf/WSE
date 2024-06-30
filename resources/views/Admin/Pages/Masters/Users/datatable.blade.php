<div class="card p-3">
    <div class="card-header">
      <h4></h4>
      <div class="card-header-form">
        <form>
          <div class="input-group">
            <input id="datatable-search" type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
          <tbody>

            </tbody>
        </table>
      </div>
    </div>
  </div>

@push('script')
<script type="text/javascript">
    $(function () {
        $('#datatable-search').keyup(function(){
            $('#datatable').DataTable().search($(this).val()).draw();
        })
        
      var table = $('#datatable').DataTable({
          "bFilter": true,
          processing: true,
          serverSide: true,
          ajax: "{{ url()->current() }}",
          "drawCallback": function () {
                $('.dataTables_paginate > .paginate_button').addClass('page-link p-2');
            },
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
      });

      $('.dataTables_filter').addClass('d-none')
    });
  </script>
@endpush