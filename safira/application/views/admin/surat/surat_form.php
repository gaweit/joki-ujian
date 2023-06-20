<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"><?php echo $title ?></h4>
            </div>
            <br>
            <div class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group col-md-12">
                        <label for="varchar">Kepada YTH:</label>
                        <select name="kepada" class="form-control">
                            <option value="Direksi PT. Air Minum Intan Banjar">Direksi PT. Air Minum Intan Banjar</option>
                            <option value="Direktur Umum PT. Air Minum Intan Banjar" <?php if ($kepada == "Direktur Umum PT. Air Minum Intan Banjar") {
                                                                                            echo "selected";
                                                                                        } ?>>Direktur Umum PT. Air Minum Intan Banjar</option>
                            <option value="Direktur Teknik PT. Air Minum Intan Banjar" <?php if ($kepada == "Direktur Teknik PT. Air Minum Intan Banjar") {
                                                                                            echo "selected";
                                                                                        } ?>>Direktur Teknik PT. Air Minum Intan Banjar</option>
                            <option value="Direktur Utama PT. Air Minum Intan Banjar" <?php if ($kepada == "Direktur Utama PT. Air Minum Intan Banjar") {
                                                                                            echo "selected";
                                                                                        } ?>>Direktur Utama PT. Air Minum Intan Banjar</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="dari"> Dari<?php echo form_error('dari') ?></label>
                        <input type="text" class="form-control" rows="3" name="dari" id="dari" placeholder="Dari"><?php echo $dari; ?></input>
                        <br>

                        <label for="tgl_surat"> Tanggal Surat<?php echo form_error('tgl_surat') ?></label>
                        <input type="date" class="form-control" rows="3" name="tgl_surat" id="tgl_surat" placeholder="tgl_surat"><?php echo $tgl_surat; ?></input>
                        <br>

                        <label for="lampiran"> Lampiran<?php echo form_error('lampiran') ?></label>
                        <input type="text" class="form-control" rows="3" name="lampiran" id="lampiran" placeholder="Lampiran"><?php echo $lampiran; ?></input>
                        <br>

                        <label for="perihal"> Perihal<?php echo form_error('perihal') ?></label>
                        <input type="text" class="form-control" rows="3" name="perihal" id="perihal" placeholder="Perihal"><?php echo $perihal; ?></input>
                        <br>

                        <label for="latar_belakang"> Latar Belakang <?php echo form_error('latar_belakang') ?></label>
                        <textarea class="form-control" rows="3" name="latar_belakang" id="latar_belakang" placeholder="Latar belakang"><?php echo $latar_belakang; ?></textarea>
                        <br>

                        <label for="maksud_tujuan"> Maksud Dan Tujuan<?php echo form_error('maksud_tujuan') ?></label>
                        <textarea class="form-control" rows="3" name="maksud_tujuan" id="maksud_tujuan" placeholder="Maksud tujuan"><?php echo $maksud_tujuan; ?></textarea>
                        <br>

                        <label for="permasalahan"> Permasalahan<?php echo form_error('permasalahan') ?></label>
                        <textarea class="form-control" rows="3" name="permasalahan" id="permasalahan" placeholder="Permasalahan"><?php echo $permasalahan; ?></textarea>
                        <br>

                        <label for="usulan"> Usulan<?php echo form_error('usulan') ?></label>
                        <textarea class="form-control" rows="3" name="usulan" id="usulan" placeholder="Usulan"><?php echo $usulan; ?></textarea>
                        <br>

                        <label for="penutup"> Penutup<?php echo form_error('penutup') ?></label>
                        <textarea class="form-control" rows="3" name="penutup" id="penutup" placeholder="Penutup"><?php echo $penutup; ?></textarea>
                        <br>

                        <label for="diketahui_oleh"> Diketahui Oleh<?php echo form_error('diketahui_oleh') ?></label>
                        <input type="text" class="form-control" rows="3" name="diketahui_oleh" id="diketahui_oleh" placeholder="Diketahui Oleh"><?php echo $diketahui_oleh; ?></input>
                        <br>

                        <label for="nama_diketahui"> Diketahui Nama pegawai <?php echo form_error('nama_diketahui') ?></label>
                        <input type="text" class="form-control" rows="3" name="nama_diketahui" id="nama_diketahui" placeholder="Diketahui Nama pegawai "><?php echo $nama_diketahui; ?></input>
                        <br>

                        <label for="nipp_diketahui"> NIPP diketahui<?php echo form_error('nipp_diketahui') ?></label>
                        <input type="text" class="form-control" rows="3" name="nipp_diketahui" id="nipp_diketahui" placeholder="NIPP diketahui"><?php echo $nipp_diketahui; ?></input>
                        <br>

                        <label for="nama_dibuat"> Dibuat Oleh ( Nama Pegawai ) <?php echo form_error('nama_dibuat') ?></label>
                        <input type="text" class="form-control" rows="3" name="nama_dibuat" id="nama_dibuat" placeholder="Nama Dibuat"><?php echo $nama_dibuat; ?></input>
                        <br>

                        <label for="nipp_dibuat"> NIPP Pegawai<?php echo form_error('nipp_dibuat') ?></label>
                        <input type="text" class="form-control" rows="3" name="nipp_dibuat" id="nipp_dibuat" placeholder="NIPP Dibuat"><?php echo $nipp_dibuat; ?></input>
                        <br>


                    </div>

                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo base_url('admin/surat') ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </form><br>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row