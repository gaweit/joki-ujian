<?php

$edit = mysqli_query($con, "SELECT * FROM tb_praktikan WHERE id_praktikan='$_GET[id]'");
foreach ($edit as $d) ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Praktikan</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="dashboard.php">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="?page=praktikan">Data Praktiktan</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="?page=praktikan">Edit Praktikan</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h3 class="h4">Form Edit Asisten</h3>
				</div>
				<div class="card-body">
					<form action="?page=praktikan&act=proses" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>NIM</label>
							<input type="hidden" name="" value="<?= $d['id_praktikan'] ?>">
							<input name="nim" type="text" class="form-control" value="<?= $d['nim'] ?>" readonly>
						</div>

						<div class="form-group">
							<label>Nama Praktikan</label>
							<input type="hidden" name="id" value="<?= $d['id_praktikan'] ?>">
							<input name="nama" type="text" class="form-control" value="<?= $d['nama_praktikan'] ?>" readonly>
						</div>

						<div class="col-md">
							<div class="form-group">
								<label>Masa Aktif</label>
								<select name="status" class="form-control">
									<option value="">- Pilih -</option>
									<option value="1">Aktif</option>
									<option value="">Non-Aktif</option>
								</select>
							</div>
						</div>


						<div class="form-group">
							<button name="editPraktikan" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
							<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
						</div>


					</form>


				</div>
			</div>
		</div>
	</div>
</div>