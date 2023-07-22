<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Jadwal</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Jadwal Mengajar</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Tambah Jadwal</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Jadwal Mengajar</div>
				</div>
				<div class="card-body">
					<form action="" method="post">



						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Asisten Praktikum</label>
									<select name="asisten" class="form-control">
										<option value="">- Pilih -</option>
										<?php
										$asisten = mysqli_query($con, "SELECT * FROM tb_asisten ORDER BY id_asisten ASC");
										foreach ($asisten as $g) {
											echo "<option value='$g[id_asisten]'>($g[nim]) $g[nama_asisten]</option>";
										}
										?>

									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Praktikum</label>
									<select name="praktikum" class="form-control">
										<option value="">- Pilih -</option>
										<?php
										$praktikum = mysqli_query($con, "SELECT * FROM tb_praktikum ORDER BY id_praktikum ASC");
										foreach ($praktikum as $p) {
											echo "<option value='$p[id_praktikum]'>$p[nama_praktikum]</option>";
										}
										?>

									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Shift</label>
									<select name="shift" class="form-control">
										<option value="">- Pilih -</option>
										<?php
										$shift = mysqli_query($con, "SELECT * FROM tb_shift ORDER BY id_shift ASC");
										foreach ($shift as $g) {
											echo "<option value='$g[id_shift]'>$g[shift]</option>";
										}
										?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<button type="submit" name="save" class="btn btn-primary">
										<i class="far fa-save"></i> Simpan
									</button>
									<a href="javascript:history.back()" class="btn btn-danger">
										<i class="fas fa-angle-double-left"></i> Kembali
									</a>
								</div>
							</div>
						</div>
					</form>

					<?php

					if (isset($_POST['save'])) {


						$shift = $_POST['shift'];
						$asisten = $_POST['asisten'];
						$praktikum = $_POST['praktikum'];



						$insert = mysqli_query($con, "INSERT INTO tb_mengajar VALUES (NULL,'$shift','$asisten','$praktikum') ");

						if ($insert) {
							echo "
								<script type='text/javascript'>
								setTimeout(function () { 

								swal('Sukses', 'Jadwal ditambahkan', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('?page=jadwal');
								} ,3000);   
								</script>";
						}
					}


					?>



				</div>

			</div>
		</div>
	</div>
</div>
</div>