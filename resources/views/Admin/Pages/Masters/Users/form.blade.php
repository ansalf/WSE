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
                        <label for="role" class="col-lg-3 col-lg-offset-1 control-label">Role</label>
                        <div class="col-lg-9">
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Pilih Role</option>
                                @foreach ($roles as $key => $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                        <label for="username" class="col-lg-3 col-lg-offset-1 control-label">Username</label>
                        <div class="col-lg-9">
                            <input type="text" name="username" id="username" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-lg-3 col-lg-offset-1 control-label">Email</label>
                        <div class="col-lg-9">
                            <input type="email" name="email" id="email" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-lg-3 col-lg-offset-1 control-label">Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="password" id="password" class="form-control" 
                            required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confirm_password" class="col-lg-3 col-lg-offset-1 control-label">Konfirmasi Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" 
                                required
                                data-match="#password">
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