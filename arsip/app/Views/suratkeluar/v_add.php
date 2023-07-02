<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-primary box-solid" style="border-color: #A64B2A;">
            <div class="box-header with-border" style="background: #A64B2A;">
                <h3 class="box-title">Add Surat keluar</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h4>Ada Kesalahan</h4>
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php echo form_open_multipart('suratkeluar/insert'); ?>

                <div class="form-group">
                    <label>Nomor Surat keluar</label>
                    <input name="no_surat" class="form-control" placeholder="Nomor Surat keluar">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Penerima</label>
                    <input name="penerima" class="form-control" placeholder="penerima">
                </div>

                <div class="form-group">
                    <label>Tanggal surat</label>
                    <input name="tgl_surat" class="form-control" placeholder="Tanggal surat">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label>File Surat</label>
                    <input type="file" name="file surat" class="form-control">
                    <label class="text-danger">Format File Harus PDF</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?= base_url('suratkeluar') ?>" class="btn btn-success">Back</a>
                </div>

                <?php echo form_close() ?>


            </div>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-3">
    </div>
</div>