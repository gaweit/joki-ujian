<?php 
//Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Notofikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//Opern Form
echo form_open(base_url('admin/dasbor/profile'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama ?>" required> 	
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user ->email ?>" required> 	
	</div>

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required readonly disabled> 	
	</div>

	<div class="form-group">
		<label>Password <span class="text-danger"><small>(Password minimal 6 karakter atau biarkan kosong)</small></span></label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>"> 	
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Level Hak Akses</label>
		<select name="akses_level" class="form-control">
			<option value="<?php echo $user->akses_level ?>"><?php echo $user->akses_level ?></option>
		</select>	
	</div>

	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $user->keterangan ?></textarea>	
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>

<?php 
//Form Close
echo form_close();
?>