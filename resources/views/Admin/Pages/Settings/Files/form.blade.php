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
                    <img id="img-viewer" src="" class="img-fluid" alt="" srcset="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>