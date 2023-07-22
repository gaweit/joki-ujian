<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
	.highlight {
		background-color: yellow;
	}
</style>

<?php
// Query untuk mendapatkan data dari tabel nilai
// $query = "SELECT tb_praktikum.nama_praktikum,tb_praktikum.minggu,tb_praktikum.id_praktikum FROM tb_nilai
// INNER JOIN tb_praktikan ON tb_nilai.nim = tb_praktikan.nim
// INNER JOIN tb_praktikum ON tb_nilai.id_praktikum = tb_praktikum.id_praktikum
// INNER JOIN tb_modul ON tb_nilai.id_modul = tb_modul.id_modul
// WHERE id_praktikan = '$id_login'";

// $result = mysqli_query($con, $query);
// $row = mysqli_fetch_assoc($result)
?>


<div class="panel-header bg-dark-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Presensi Praktikum</h2>
				<h5 class="text-white op-7 mb-2">Selamat Datang, <b class="text-danger"><?= $nama_kapital; ?></b></h5>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--15">
	<div class="row mt--2">
		<div class="col-md-8">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">
						<center>
							<br>
							<img src="../assets/img/logo1.png" width="150">
							<br>
							<br>
							<h1 style="font-weight: bolder;">Telkom University</h1>
						</center>
					</div>
					<div class="card-category">
						<center>
							Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Telkom University, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257
							<br>Telp. 0227564108
						</center>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<?php include('kalender.php'); ?>
			</div>
		</div>



	</div>

	<div style="margin: 3px;">
		<h2 class="pb-2 fw-bold">Daftar praktikum yang diambil</h2>
	</div>

	<?php
	$query = "SELECT DISTINCT minggu, nama_praktikum, tb_nilai.status, tb_nilai.id_praktikum FROM tb_nilai 
				INNER JOIN tb_praktikan ON tb_nilai.nim = tb_praktikan.nim
				INNER JOIN tb_praktikum ON tb_nilai.id_praktikum = tb_praktikum.id_praktikum
				WHERE id_praktikan = '$id_login'";
	$result = mysqli_query($con, $query);

	// Memisahkan data praktikum ke dalam array berdasarkan minggu
	$praktikumPerMinggu = array();
	?>
	<?php if (mysqli_num_rows($result) > 0) { ?>
		<?php while ($row = mysqli_fetch_assoc($result)) {
			$minggu = $row['minggu'];
			$praktikumPerMinggu[$minggu][] = $row;
		} ?>

		<!-- Menampilkan praktikum per minggu -->
		<?php
		$sortedWeeks = array_keys($praktikumPerMinggu);
		sort($sortedWeeks);
		foreach ($sortedWeeks as $week) :
		?>
			<div class="alert alert-primary">
				<div>
					<b>Minggu Ke - <?= $week; ?></b>
				</div>
				<hr>
				<?php foreach ($praktikumPerMinggu[$week] as $p) { ?>
					<li><?= $p['nama_praktikum'] ?></li>
					<?php
					// Check if jadwal exists for the current praktikum and the logged-in id_praktikan
					$queryJadwal = "SELECT * FROM tb_jadwal 
                  INNER JOIN tb_praktikan ON tb_jadwal.nim = tb_praktikan.nim
                  WHERE tb_jadwal.nama_praktikum = '{$p['nama_praktikum']}' AND tb_praktikan.id_praktikan = '$id_login'";
					$resultJadwal = mysqli_query($con, $queryJadwal);
					if (mysqli_num_rows($resultJadwal) > 0) {
						// If jadwal exists, display "Lihat Jadwal" button
						$rowJadwal = mysqli_fetch_assoc($resultJadwal);
					?>
						<form method="POST" action="">
							<input type="hidden" name="nama_praktikum" value="<?= $rowJadwal['nama_praktikum'] ?>">
							<input type="hidden" name="id_praktikum" value="<?= $p['id_praktikum'] ?>">
							<a href="#" data-toggle="modal" data-target="#lihatJadwal<?= $rowJadwal['nama_praktikum'] ?>">
								<button class="btn" style="margin-top:15px;margin-bottom:15px" type="submit">Lihat Jadwal</button>
							</a>
						</form>

						<!-- Modal -->
						<div class="modal fade" id="lihatJadwal<?= $rowJadwal['nama_praktikum'] ?>">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" style="font-weight: bolder;"><?= $rowJadwal['nama_praktikum'] ?></h3>
									</div>
									<div class="modal-body">
										<b>Hari : </b> <b><?= $rowJadwal['hari']; ?></b><br>
										<b>Shift : </b> <b><?= $rowJadwal['shift']; ?></b><br>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
									</div>
								</div>
							</div>
						</div>
						<?php } else {
						// Check the status value to display the appropriate button
						if ($p['status'] == 0) {
							echo "<span class='badge rounded-pill badge-danger' style='margin-top: 5px;margin-bottom: 5px;'>Menunggu Persetujuan</span>";
						} elseif ($p['status'] == 1) {
						?>
							<form method="POST" action="?page=jadwal">
								<input type="hidden" name="nama_praktikum" value="<?= $p['nama_praktikum'] ?>">
								<input type="hidden" name="id_praktikum" value="<?= $p['id_praktikum'] ?>">
								<button class="btn btn-danger" style="margin-top:15px;margin-bottom:15px" type="submit">Pilih Jadwal</button>
							</form>
					<?php
						}
					}
					?>
				<?php } ?>
			</div>
		<?php endforeach ?>
		<a href="?page=addpraktikum">
			<button class="btn btn-dark">Pilih Praktikum Lain</button>
		</a>
	<?php } else { ?>
		<div class="alert alert-warning">
			<strong>Anda belum mengambil praktikum</strong>
		</div>
		<a href="?page=addpraktikum">
			<button class="btn btn-danger">Pilih Praktikum</button>
		</a>
	<?php } ?>


</div>

</html>