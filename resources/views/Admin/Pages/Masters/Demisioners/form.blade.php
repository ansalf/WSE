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
                        <label for="nama" class="col-lg-3 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-9">
                            <input type="text" name="nama" id="nama" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-lg-3 col-lg-offset-1 control-label">Gender</label>
                        <div class="col-lg-9">
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="">Pilih Gender</option>
                                @foreach ($genders as $key => $gender)
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="periode" class="col-lg-3 col-lg-offset-1 control-label">Periode</label>
                        <div class="col-lg-9">
                            <input type="number" min="2000" name="periode" id="periode" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-lg-3 col-lg-offset-1 control-label">Photo</label>
                        <div class="col-lg-9" id="photo-container">
                            <div class="input-group mb-3">
                                <input type="file" name="photo[]" id="photo" class="form-control" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success add-photo-row"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-lg-3 col-lg-offset-1 control-label">Jabatan</label>
                        <div class="col-lg-9" id="jabatan-container">
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prestasi" class="col-lg-3 col-lg-offset-1 control-label">Prestasi</label>
                        <div class="col-lg-9" id="prestasi-container">
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