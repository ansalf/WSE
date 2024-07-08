<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                        <label for="kategori" class="col-lg-3 col-lg-offset-1 control-label">Kategori</label>
                        <div class="col-lg-9">
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $key => $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-lg-3 col-lg-offset-1 control-label">Judul</label>
                        <div class="col-lg-9">
                            <input type="text" name="judul" id="judul" placeholder="Judul" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-9"><img src="" alt="" class="img-view img-fluid"></div>
                    </div>
                    <div class="form-group row">
                        <label for="thumbnail" class="col-lg-3 col-lg-offset-1 control-label">Thumbnail</label>
                        <div class="col-lg-9">
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isi_berita" class="col-lg-3 col-lg-offset-1 control-label">Isi Berita</label>
                        <div class="col-lg-9">
                        <textarea name="isi_berita" id="isi_berita"></textarea>
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