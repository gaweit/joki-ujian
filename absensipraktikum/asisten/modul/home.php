<?php
$sql = mysqli_query($con, "SELECT * FROM tb_asisten
 INNER JOIN tb_praktikum ON tb_asisten.id_praktikum=tb_praktikum.id_praktikum
 WHERE id_asisten = '$id_login'") or die(mysqli_error($con));

$data = mysqli_fetch_array($sql);
?>
<div class="panel-header bg-dark-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Asisten Laboratorium</h2>
				<h5 class="text-white op-7 mb-2">Selamat Datang, <b class="text-warning"><?= $data['nama_asisten']; ?></b></h5>
			</div>
			<!-- <div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
							</div> -->
		</div>
	</div>
</div>
<div class="page-inner mt--5">
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

				<head>
					<style>
						body {
							font-family: Arial, sans-serif;
						}

						.container {
							max-width: 400px;
							margin: 0 auto;
							padding: 20px;
							text-align: center;
						}

						h2 {
							margin-bottom: 20px;
						}

						table {
							width: 100%;
						}

						th,
						td {
							padding: 8px;
							text-align: center;
						}

						.highlight {
							background-color: lightgrey;
							border-radius: 100%;
						}

						.sunday {
							color: red;
						}

						.sunday-date {
							color: red;

						}
					</style>
				</head>

				<body>
					<div class="container">
						<?php
						// Mendapatkan bulan dan tahun saat ini
						$bulan = date('m');
						$tahun = date('Y');
						date_default_timezone_set('Asia/Jakarta');
						// Mendapatkan jumlah hari dalam bulan ini
						$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

						// Mendapatkan informasi hari pertama dalam bulan ini
						$hariPertama = date('N', strtotime($tahun . '-' . $bulan . '-01'));

						// Membuat array untuk nama-nama hari
						$namaHari = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min');

						// Menampilkan kalender
						echo "<h2 style='font-weight:bolder;'> " . date('F Y') . "</h2>";
						echo "<table>";
						echo "<tr>";
						foreach ($namaHari as $hari) {
							$sundayClass = ($hari == 'Min') ? 'sunday' : ''; // Menambahkan kelas sunday pada nama hari Minggu
							echo "<th class='$sundayClass'>$hari</th>";
						}
						echo "</tr>";

						// Menampilkan tanggal dalam bentuk tabel
						$nomorHari = 1;
						$akhirBaris = false;
						for ($i = 1; $i <= 6; $i++) {
							echo "<tr>";
							for ($j = 1; $j <= 7; $j++) {
								if (($i == 1 && $j < $hariPertama) || ($nomorHari > $jumlahHari)) {
									echo "<td>&nbsp;</td>";
								} else {
									$highlightClass = ($nomorHari == date('d')) ? 'highlight' : ''; // Menambahkan kelas highlight jika tanggal saat ini
									$dayOfWeek = date('N', strtotime($tahun . '-' . $bulan . '-' . $nomorHari));
									$sundayClass = ($dayOfWeek == 7) ? 'sunday-date' : ''; // Menambahkan kelas sunday-date jika hari Minggu
									echo "<td class='$highlightClass'><span class='$sundayClass'>$nomorHari</span></td>";
									$nomorHari++;
								}
								if ($nomorHari > $jumlahHari) {
									$akhirBaris = true;
									break;
								}
							}
							echo "</tr>";
							if ($akhirBaris) {
								break;
							}
						}
						echo "</table>";
						?>
					</div>
				</body>
			</div>
		</div>
	</div>


	<div class="alert alert-default">
		<strong>
			<h1 style="font-weight: bolder;"><?= $data['nama_praktikum'] ?></h1>
		</strong>
	</div>
	<!-- <div class="card">
		<div class="card-body">
			<h5 class="card-title">Modul 1</h5>
			<br>
			<input class="btn btn-dark" type="button" value="Lihat">
		</div>
	</div> -->


</div>