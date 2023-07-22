	<?php

	$edit = mysqli_query($con, "SELECT * FROM tb_asisten 
	INNER JOIN tb_praktikum ON tb_asisten.id_praktikum=tb_praktikum.id_praktikum
	WHERE id_asisten='$_GET[id]'");
	foreach ($edit as $d) ?>
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Asisten</h4>
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
					<a href="?page=asisten">Data Asisten</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="?page=asisten">Edit Asisten</a>
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
						<form action="?page=asisten&act=proses" method="post" enctype="multipart/form-data">
							<div class="col-md">
								<div class="form-group">
									<label>Mata Praktikum</label>
									<select name="praktikum" class="form-control">
										<option value="">- Pilih Praktikum-</option>
										<?php

										$query = "SELECT id_praktikum, nama_praktikum FROM tb_praktikum";
										$result = mysqli_query($con, $query);

										while ($row = mysqli_fetch_assoc($result)) {
											echo '<option value="' . $row['id_praktikum'] . '">' . $row['nama_praktikum'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label>NIM</label>
								<input type="hidden" name="" value="<?= $d['id_asisten'] ?>">
								<input name="nim" type="text" class="form-control" value="<?= $d['nim'] ?>" readonly>
							</div>

							<div class="form-group">
								<label>Nama Asisten</label>
								<input type="hidden" name="id" value="<?= $d['id_asisten'] ?>">
								<input name="nama" type="text" class="form-control" value="<?= $d['nama_asisten'] ?>" readonly>
							</div>

							<div class="form-group">
								<button name="editAsisten" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
								<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
							</div>


						</form>


					</div>
				</div>
			</div>
		</div>
	</div>