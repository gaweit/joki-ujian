<?php
$sql = mysqli_query($con, "SELECT * FROM tb_asisten
 WHERE id_asisten = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>
<div class="page-inner">

	<div class="page-header">
		<h4 class="page-title">Jadwal</h4>
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
				<a href="#">Jadwal Saya</a>
			</li>
		</ul>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">
						<!-- <a href="#" data-toggle="modal" data-target="#jadwalmengajar" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Jadwal Mengajar</a> -->
						<form action="?page=jadwal&act=add" method="post">

							<input type="hidden" name="id_praktikum" value="<?= $data['id_praktikum'] ?>">
							<button class="btn btn-primary btn-sm text-white">
								<i class="fa fa-plus"></i> Jadwal
							</button>
						</form>


					</div>
				</div>

				<!-- datatables -->
				<link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
				<script type="text/javascript" src="../datatables/datatables.js"></script>

				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Asisten</th>
									<th>Praktikum</th>
									<th>Hari</th>
									<th>Shift</th>

									<!-- <th>Opsi </th> -->
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$praktikum = mysqli_query($con, "SELECT * FROM tb_mengajar 
                            					 INNER JOIN tb_asisten ON tb_mengajar.id_asisten=tb_asisten.id_asisten
                           		 				 INNER JOIN tb_praktikum ON tb_mengajar.id_praktikum=tb_praktikum.id_praktikum
												 INNER JOIN tb_hari ON tb_mengajar.id_hari=tb_hari.id_hari
                            					 INNER JOIN tb_shift ON tb_mengajar.id_shift=tb_shift.id_shift
												 WHERE tb_asisten.id_asisten = '$id_login'
                              		 			  ");
								foreach ($praktikum as $d) {
								?>

									<tr>
										<th scope="row"><b><?= $no++; ?>.</b></th>
										<td><?= $d['nama_asisten'] ?></td>
										<td><?= $d['nama_praktikum'] ?></td>
										<td><?= $d['nama_hari'] ?></td>
										<td><?= $d['shift'] ?></td>
									</tr>
								<?php } ?>

							</tbody>
						</table>
					</div>
					<script>
						$(document).ready(function() {
							$('#example').DataTable();
						});
					</script>
				</div>
			</div>
		</div>
	</div>
	<!-- modal Tambah Jadwal Mengajar -->


</div>