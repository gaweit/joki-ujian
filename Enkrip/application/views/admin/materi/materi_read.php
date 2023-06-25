<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-4">
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
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <td>Isi Materi</td>
                            <td><?php echo $nama_dokumen; ?></td>
                        </tr>
                        <tr>
                            <td>Isi Materi</td>
                            <td><?php echo $nama_enkrip; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><?php echo $tgl; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?php echo base_url('admin/materi') ?>" class="btn btn-danger">Cancel</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>