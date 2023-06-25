<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                        data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                        data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                        data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                        data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"><?php echo $title ?></h4>
            </div>
            <br>
            <div class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="varchar">Dokumen</label>
                        <input type="file" class="form-control" name="nama_dokumen">
                        <!-- accept="image/png, image/jpeg, image/jpg, image/gif" -->
                    </div>
                    <div class="form-group col-md-12">
                        <label for="varchar">Dokumen</label>
                        <input type="file" class="form-control" name="nama_enkrip"
                            accept="image/png, image/jpeg, image/jpg, image/gif">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="tgl">Tanggal <?php echo form_error('tgl') ?></label>
                        <input type="date" class="form-control" name="tgl" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="hidden" name="id_dokumen" value="<?php echo $id_dokumen; ?>" />
                        <input type="hidden" name="id_user" value="1" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo base_url('admin/materi') ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </form><br>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row