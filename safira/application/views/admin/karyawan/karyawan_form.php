
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
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group col-md-6">
             <label for="varchar">NIK <?php echo form_error('NIK') ?></label>
            <input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="<?php echo $NIK; ?>" />

            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
 
            <label for="varchar">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
          
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan" <?php if($jenis_kelamin=="Perempuan") {echo "selected"; }?>>Perempuan</option>
        </select> 
    
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>

	    <div class="form-group col-md-6">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />

            <label for="int">Bidang/Bagian</label>
            <select name="id_bidang" class="form-control">
                <option>--Pilih--</option>
                <?php foreach ($bidang as $bidang) { ?>

                    <option value="<?php echo $bidang->id_bidang ?>" <?php if($id_bidang==$bidang->id_bidang){echo "selected"; } ?>>
                        <?php echo $bidang->bagian_karyawan ?> 
                    </option>
                <?php } ?>
            </select>
  
            <label for="varchar">Foto</label>
             <input type="file" class="form-control" name="foto"  />
            <?php 
            if ($foto !== '') {
                ?>
                <div>
                    *) Gambar Sebelumnya <br>
                    <img src="<?php echo base_url('gambar/thumb/'.$foto) ?>" style="width: 100px;height: 100px;">
                </div>
                <?php
            } else {
                echo "";
            }
            ?>
        </div>
         <div class="form-group" style="margin-left: 40%">
        <label class="control-label"></label>
	    <input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('admin/karyawan') ?>" class="btn btn-danger">Cancel</a>
        </div>
</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end rowbarang_form_edit