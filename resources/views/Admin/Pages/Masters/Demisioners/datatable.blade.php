<div class="card p-3">
    <div class="card-header">
      <h4></h4>
      <div class="card-header-form">
        <form>
          <div class="input-group">
            <input id="datatable-search" type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button type="button" onclick="addForm('{{ route('demisioners.store') }}')" class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
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
                    <th>#</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Periode</th>
                    <th>Action</th>
                </tr>
            </thead>
          <tbody>

            </tbody>
        </table>
      </div>
    </div>
  </div>