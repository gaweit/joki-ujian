<?php
//Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//Notofikasi
if ($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//Opern Form
echo form_open(base_url('admin/dasbor/profile'));
?>

<div class="row">
	<!-- begin col-6 -->
	<div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="table-basic-4">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title"><?php echo $title ?></h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<td>Nama</td>
							<td><?php echo $user->nama; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $user->email; ?></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><?php echo $user->username; ?></td>
						</tr>
						<tr>
							<td>Level Hak Akses</td>
							<td><?php echo $user->akses_level; ?></td>
						</tr>
						<tr>
							<td>Bio</td>
							<td><?php echo $user->keterangan; ?></td>
						</tr>
						<tr>
							<td>Foto</td>
							<td> <?php if ($foto != "") { ?>
									<img src="<?php echo base_url('gambar/thumb/' . $foto) ?>" class="img img-thumbnail" width="100">
								<?php } else {
										echo 'Tidak ada';
									} ?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a href="<?php echo base_url('admin/user/edit/' . $user->id_user) ?>" class="btn btn-warning">Edit</a>
								<a href="<?php echo base_url('admin/dasbor') ?>" class="btn btn-danger">Cancel</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

<?php
//Form Close
echo form_close();
?>


<!-- sebelumnya  -->
<!-- <div class="col-md-6">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama ?>" required>
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
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
</div> -->