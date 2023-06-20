<?php 
//Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Opern Form
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>
<!-- begin row -->
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
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-6">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama" 
		value="<?php echo $user->nama  ?>" required>

		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" 
		value="<?php echo $user->email  ?>" required>

		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" 
		value="<?php echo $user->username  ?>" required readonly disabled>

		<label>Password <span class="text-danger"><small>(Password Minimal 6 karakter atau biarkan kosong)</small></span></label>
		<input type="password" name="password" class="form-control" placeholder="Password" 
		value="<?php echo set_value('password')  ?>">
	</div>

<div class="form-group col-md-6">
	         <?php if($this->session->userdata('akses_level') != "Admin"){  ?>
        <input type="hidden" class="form-control" name="akses_level"  value="Karyawan" />

          <?php }else { ?>
		<label>Level Hak Akses</label>
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="Karyawan" <?php if($user->akses_level=="Karyawan") {echo "selected"; } ?>>Karyawan</option>
		</select>	
		        <?php } ?>

		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $user->keterangan ?></textarea>	

</div>


		<div class="form-group">
        <label class="control-label"></label>
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
		</div>
</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end row -->

<?php 
//Form Close
echo form_close();
?>