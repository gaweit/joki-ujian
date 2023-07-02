<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid" style="border-color: #A64B2A;">
            <div class="box-header with-border" style="background: #A64B2A;">
                <h3 class="box-title">Data Surat keluar</h3>

                <?php if (session()->get('level') == 1) { ?>
                    <div class="box-tools pull-right">
                        <a href="<?= base_url('suratkeluar/add') ?>" class="btn btn-primary btn-sm btn-flat">
                            <i class="fa fa-push"> Add</i></a>
                    </div>
                <?php } ?>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo  '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Success!</h4>';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Penerima</th>
                        <th>Tanggal Surat</th>
                        <th>User</th>
                        <th>File Surat</th>

                        <?php if (session()->get('level') == 1) { ?>
                            <th width="100px">Opsi</th>
                        <?php } ?>

                        <?php if (session()->get('level') == 2) { ?>
                            <th></th>
                        <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($suratkeluar as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['no_surat']; ?></td>
                                <td><?= $value['nama_kategori']; ?></td>
                                <td><?= $value['penerima']; ?></td>
                                <td><?= $value['tgl_surat']; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td class="text-center"><a href="<?= base_url('suratkeluar/viewpdf/' . $value['id_suratkeluar']) ?>"><i class="fa fa-file-pdf-o fa-2x label-danger"></i></a></td>
                                <td class="text-center">

                                    <?php if (session()->get('level') == 1) { ?>
                                        <a href="<?= base_url('suratkeluar/edit/' . $value['id_suratkeluar']) ?>" class="btn btn-xs btn-warning">Edit</a>
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_suratkeluar']; ?>">Hapus</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <!-- /.modal delete surat keluar -->
    <?php foreach ($suratkeluar as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_suratkeluar']; ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus Surat keluar</h4>
                    </div>
                    <div class="modal-body">

                        Apakah anda yakin ingin menghapus data surat ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('suratkeluar/delete/' . $value['id_suratkeluar']) ?>" type="submit" class="btn btn-primary">Ya</a>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <!-- end modal delete  surat keluar -->