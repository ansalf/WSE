<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                            <left><h4 class="modal-title"></h4></left>
                <right><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button></right>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="master_id" class="col-lg-3 col-lg-offset-1 control-label">Parent</label>
                        <div class="col-lg-9">
                            <select name="master_id" id="master_id" class="form-control" required>
                                <option value="">Pilih Parent</option>
                                @foreach ($parent as $key => $pr)
                                <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-9">
                            <input type="text" name="name" id="name" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>