	<?php
	$nilai = mysqli_query($con, "SELECT * FROM tb_praktikan WHERE id_praktikan='$_GET[id]' ");
	foreach ($nilai as $n) ?>
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Input Nilai</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="index.php">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Input Nilai</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
			</ul>
		</div>

		<a href="javascript:history.back()" class="btn btn-default wrap-login100" style=" margin-left: 0px">
			<i class="fas fa-arrow-circle-left"></i> Kembali</a><br>

		<br>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-body">
							<div class="table-responsive">
								<table id="basic-datatables" class="display table table-striped table-hover">
									<thead>
										<tr>

											<th>NIM</th>
											<th>Nama Praktikan</th>
											<th>TP</th>
											<th>TA</th>
											<th>D1</th>
											<th>D2</th>
											<th>D3</th>
											<th>D4</th>
											<th>i1</th>
											<th>i2</th>
										</tr>
									</thead>

									<tfoot>
										<tbody>
											<?php
											$no = 1;
											$praktikan = mysqli_query($con, "SELECT * FROM tb_praktikan"); ?>
											<form action="" method="post" enctype="multipart/form-data">
												<input name="id" type="hidden" value="<?= $n['id_praktikan'] ?>">
												<input name="id_prak" type="hidden" value="<?= $data['id_praktikum'] ?>">
												<input name="nim" type="hidden" value="<?= $n['nim'] ?>">
												<tr>

													<label>Pilih Modul</label>
													<select name="modul" class="form-control">
														<option value="">- Pilih -</option>
														<?php
														$modul = mysqli_query($con, "SELECT * FROM tb_modul ORDER BY id_modul ASC");
														foreach ($modul as $m) {
															echo "<option value='$m[id_modul]'>$m[nama_modul]</option>";
														}
														?>

													</select>

												</tr>
												<tr>
													<td><?= $n['nim'] ?></td>
													<td><?= $n['nama_praktikan'] ?></td>
													<td><input type="number" id="nilai" name="TP" min="0" max="100" required></td>
													<td><input type="number" id="nilai" name="TA" min="0" max="100" required></td>
													<td><input type="number" id="nilai" name="D1" min="0" max="100" required></td>
													<td><input type="number" id="nilai" name="D2" min="0" max="100" required></td>
													<td><input type="number" id="nilai" name="D3" min="0" max="100" required></td>
													<td><input type="number" id="nilai" name="D4" min="0" max="100" required></td>
													<td><input type="number" id="nilai" name="i1" min="0" max="100" required></td>
													<td><input type="number" id="nilai" name="i2" min="0" max="100" required></td>
												</tr>
										</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>



		</div>
		<!-- <a href="#" class="btn btn-primary wrap-login100" style=" margin-left: 0px">
			<i class=""></i> Submit</a><br> -->
		<br>
		<button name="simpannilai" type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>

	<?php

	if (isset($_POST['simpannilai'])) {
		echo $_POST['nim'];
		echo $_POST['TP'];
		echo $_POST['TA'];
		$save = mysqli_query($con, "INSERT INTO tb_nilai VALUES(NULL,'$_POST[nim]','$_POST[id_prak]','$_POST[modul]','$_POST[TP]','$_POST[TA]','$_POST[D1]','$_POST[D2]','$_POST[D3]','$_POST[D4]','$_POST[i1]','$_POST[i2]') ");
		if ($save) {
			echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=presensi&act=scan');
				} ,3000);   
				</script>";
		}
	}
